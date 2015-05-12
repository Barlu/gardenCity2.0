<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dropzone
 *
 * @author Emmett
 */
class Dropzone extends CI_Controller {

    public function upload($id, $type) {
        if (!empty($_FILES)) {
            $this->load->library('upload');
            $upload = $this->upload->_upload_image('uploads/images/', $type);
            $this->load->library('doctrine');
            $em = $this->doctrine->em;
            if ($type === 'bag-details' || $type === 'produce-details') {
                if ($type === 'bag-details') {
                    $product = $em->getReference('Entity\Bag', $id);
                } else if ($type === 'produce-details') {
                    $product = $em->getReference('Entity\Produce', $id);
                }
                $product->getImage()->setLocation(base_url() . 'uploads/images/' . $upload['upload_data']['file_name']);
            } else {
                $image = new Entity\Image;
                $image->setLocation(base_url() . 'uploads/images/' . $upload['upload_data']['file_name']);
                $em->persist($image);
                if ($type !== 'banner') {
                    $gallery = $em->getReference('Entity\Gallery', $id);
                    $gallery->addImage($image);
                } else {
                    $banner = new Entity\Banner;
                    $banner->setImage($image);
                    $em->persist($banner);
                }
                $em->flush();
                $data['image'] = $image;
                if ($type !== 'banner') {
                    $this->load->view('partials/content/images/image_thumbnail', $data);
                } else {
                    $data['banner'] = $banner;
                    $this->load->view('partials/content/images/banner-image_thumbnail', $data);
                }
            }
            $em->flush();
        }
    }

}
