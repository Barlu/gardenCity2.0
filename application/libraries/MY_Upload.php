<?php

class MY_Upload extends CI_Upload {

    private $CI;

    function __construct() {
        parent::__construct();
        $this->CI = & get_instance();
    }

    public function do_upload($field = 'userfile', $type = null) {

        // Is $_FILES[$field] set? If not, no reason to continue.
        if (!isset($_FILES[$field])) {
            $this->set_error('upload_no_file_selected');
            return FALSE;
        }

        // Is the upload path valid?
        if (!$this->validate_upload_path()) {
            // errors will already be set by validate_upload_path() so just return FALSE
            return FALSE;
        }

        // Was the file able to be uploaded? If not, determine the reason why.
        if (!is_uploaded_file($_FILES[$field]['tmp_name'])) {
            $error = (!isset($_FILES[$field]['error'])) ? 4 : $_FILES[$field]['error'];

            switch ($error) {
                case 1: // UPLOAD_ERR_INI_SIZE
                    $this->set_error('upload_file_exceeds_limit');
                    break;
                case 2: // UPLOAD_ERR_FORM_SIZE
                    $this->set_error('upload_file_exceeds_form_limit');
                    break;
                case 3: // UPLOAD_ERR_PARTIAL
                    $this->set_error('upload_file_partial');
                    break;
                case 4: // UPLOAD_ERR_NO_FILE
                    $this->set_error('upload_no_file_selected');
                    break;
                case 6: // UPLOAD_ERR_NO_TMP_DIR
                    $this->set_error('upload_no_temp_directory');
                    break;
                case 7: // UPLOAD_ERR_CANT_WRITE
                    $this->set_error('upload_unable_to_write_file');
                    break;
                case 8: // UPLOAD_ERR_EXTENSION
                    $this->set_error('upload_stopped_by_extension');
                    break;
                default : $this->set_error('upload_no_file_selected');
                    break;
            }

            return FALSE;
        }


        // Set the uploaded data as class variables
        $this->file_temp = $_FILES[$field]['tmp_name'];
        $this->file_size = $_FILES[$field]['size'];
        $this->_file_mime_type($_FILES[$field]);
        $this->file_type = preg_replace("/^(.+?);.*$/", "\\1", $this->file_type);
        $this->file_type = strtolower(trim(stripslashes($this->file_type), '"'));
        $this->file_name = $this->_prep_filename($_FILES[$field]['name']);
        $this->file_ext = $this->get_extension($this->file_name);
        $this->client_name = $this->file_name;

        // Is the file type allowed to be uploaded?
        if (!$this->is_allowed_filetype()) {
            $this->set_error('upload_invalid_filetype');
            return FALSE;
        }

        // if we're overriding, let's now make sure the new name and type is allowed
        if ($this->_file_name_override != '') {
            $this->file_name = $this->_prep_filename($this->_file_name_override);

            // If no extension was provided in the file_name config item, use the uploaded one
            if (strpos($this->_file_name_override, '.') === FALSE) {
                $this->file_name .= $this->file_ext;
            }

            // An extension was provided, lets have it!
            else {
                $this->file_ext = $this->get_extension($this->_file_name_override);
            }

            if (!$this->is_allowed_filetype(TRUE)) {
                $this->set_error('upload_invalid_filetype');
                return FALSE;
            }
        }

        // Convert the file size to kilobytes
        if ($this->file_size > 0) {
            $this->file_size = round($this->file_size / 1024, 2);
        }

        // Is the file size within the allowed maximum?
        if (!$this->is_allowed_filesize()) {
            $this->set_error('upload_invalid_filesize');
            return FALSE;
        }

        // Are the image dimensions within the allowed size?
        // Note: This can fail if the server has an open_basdir restriction.
        if (!$this->is_allowed_dimensions()) {
            $this->set_error('upload_invalid_dimensions');
            return FALSE;
        }

        // Sanitize the file name for security
        $this->file_name = $this->clean_file_name($this->file_name);

        // Truncate the file name if it's too long
        if ($this->max_filename > 0) {
            $this->file_name = $this->limit_filename_length($this->file_name, $this->max_filename);
        }

        // Remove white spaces in the name
        if ($this->remove_spaces == TRUE) {
            $this->file_name = preg_replace("/\s+/", "_", $this->file_name);
        }

        /*
         * Validate the file name
         * This function appends an number onto the end of
         * the file if one with the same name already exists.
         * If it returns false there was a problem.
         */
        $this->orig_name = $this->file_name;

        if ($this->overwrite == FALSE) {
            $this->file_name = $this->set_filename($this->upload_path, $this->file_name);

            if ($this->file_name === FALSE) {
                return FALSE;
            }
        }

        /*
         * Run the file through the XSS hacking filter
         * This helps prevent malicious code from being
         * embedded within a file.  Scripts can easily
         * be disguised as images or other file types.
         */
        if ($this->xss_clean) {
            if ($this->do_xss_clean() === FALSE) {
                $this->set_error('upload_unable_to_write_file');
                return FALSE;
            }
        }


        if (strtolower($this->file_ext) === '.jpg' || strtolower($this->file_ext) == '.jpeg' || strtolower($this->file_ext) == '.png' || strtolower($this->file_ext) == '.gif') {
            
            $configs = $this->_getImageConfigs(@getimagesize($this->file_temp), $type);
            $this->CI->load->library('image_lib');
            //Crop image to reflect ratio from config files
            foreach ($configs as $key => $config) {
                $source_size = @getimagesize($this->file_temp);
                $config['source_image'] = $this->file_temp;
                // Calculate aspect ratio for source and destination image
                $source_ratio = $source_size[0] / $source_size[1];
                $new_ratio = $config['width'] / $config['height'];

                // Generic cropping settings
                $conf = array('source_image' => $config['source_image'], 'maintain_ratio' => FALSE);

                // Calculate width, height and axis cropping settings from the 
                // destination image aspect ratio
                if ($new_ratio !== $source_ratio) {
                    if ($new_ratio > $source_ratio || ($new_ratio == 1 && $source_ratio < 1)) {
                        // Destination ratio image is either more 'landscape shaped' than
                        // the source ratio, or the image is a square and the source is
                        // portrait. We will slice from top & bottom
                        $conf['width'] = $source_size[0];
                        $conf['height'] = round($source_size[0] / $new_ratio);
                        $conf['y_axis'] = ($source_size[1] - $conf['height']) / 2;
                    } else {
                        // We need to slice from left & right
                        $conf['width'] = round($source_size[1] * $new_ratio);
                        $conf['height'] = $source_size[1];
                        $conf['x_axis'] = ($source_size[0] - $conf['width']) / 2;
                    }

                    $this->CI->image_lib->initialize($conf);
                    $this->CI->image_lib->crop();
                    $this->CI->image_lib->clear();
                }


                $config['new_image'] = $this->upload_path . $this->file_name;

                
                $this->CI->image_lib->initialize($config);
                if (!$this->CI->image_lib->resize()) {
                    $error = $this->CI->image_lib->display_errors();
                }

                $this->CI->image_lib->clear();
            }
        } else {
            /*
		 * Move the file to the final destination
		 * To deal with different server configurations
		 * we'll attempt to use copy() first.  If that fails
		 * we'll use move_uploaded_file().  One of the two should
		 * reliably work in most environments
		 */
		if ( ! @copy($this->file_temp, $this->upload_path.$this->file_name))
		{
			if ( ! @move_uploaded_file($this->file_temp, $this->upload_path.$this->file_name))
			{
				$this->set_error('upload_destination_error');
				return FALSE;
			}
		}
        }

        /*
         * Set the finalized image dimensions
         * This sets the image width/height (assuming the
         * file was an image).  We use this information
         * in the "data" function.
         */
        $this->set_image_properties($this->upload_path . $this->file_name);

        return TRUE;
    }

    private function _getImageConfigs($size, $type = null) {
        if ($type === 'banner') {
            $keys = [
                'thumb',
                'small',
                'medium',
                'large'
            ];
        } else {
            $keys = [
                'thumb',
                'small',
                'medium'
            ];
        }

        $this->CI->config->load('image_presets');
//        Assesses size of image against width prests from config.
//        If original image size is larger it will load the config.
        foreach ($keys as $key) {
            $config = $this->CI->config->item($key);
            if ($config['width'] <= $size[0]) {


                $configs[$key] = $this->CI->config->item($key);
            }
        }
        return $configs;
    }

    public function _upload_image($path, $type = null) {
        $config = [
            'upload_path' => $path,
            'allowed_types' => 'jpg|png|gif|jpeg'
        ];
        $this->initialize($config);
        if (!$this->do_upload('image', $type)) {
            $data = array('error' => $this->display_errors());
        } else {
            $data = array('upload_data' => $this->data());
        }
        return $data;
    }

}
