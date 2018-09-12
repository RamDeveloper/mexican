<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;

/*
  $checkImage = $this->checkImage($param1)
  --------------
  @param1- uploaded image which used check the extension type and  diemision of the image.

  $imageCreate = $this->ImageUpload->upload_image_and_thumbnail($param1,$param2,$param3);
  -------------------------
  @$param1 = Image name from the uploaded image
  @$param2  = you can set the folder name as your wish
  @$param3 = Create the folder and manipulate the user uploaded images in single directory for easy manipulation.

  $filetypes = $this->resizeImage($filetype,$img_tmpname,$this->homeUploaddir,$img);

 */
class ImageUploadComponent extends Component {

    private $homeUploaddir;
    private $fileType;
    private $fileExtension;

    public function checkImage($img) {

        /*
          Check the imageSize to avoid the bigger size images
         */
        $acceptImagesize = 2072744;
        $imageSize = $img['size'];
        if ($imageSize <= $acceptImagesize) {
            $this->fileExtension = $this->getFileExtension($img['name']);
            $img_tmpname = $img['tmp_name'];
            $this->filetype = strtolower($this->fileExtension);
            /* Verify Extension and Image Size */
            if (($this->filetype == "jpeg") || ($this->filetype == "jpg") || ($this->filetype == "png")) {
                // Get the image size
                $img_dimensionSize = GetImageSize($img['tmp_name']);
                $image_width = $img_dimensionSize[0];
                $image_height = $img_dimensionSize[1];
                if ($image_width < 200 || $image_height < 200) {
                    $output['error'] = "Please Upload image should be in minimum 200*200px";
                }
                else {
                    $output['error'] = '';
                }
            } else {
                $output['error'] = "Uploaded image should be in JPEG or PNG";
            }
        } else {
            $output['error'] = "Uploaded image size should be in Less than 2.00 MB";
        }

        return $output;
    }

    public function upload_image_and_thumbnail($img, $folderName, $id) {
        $output = [];
        $homedir = "img/" . $folderName;
        $this->homeUploaddir = "img/" . $folderName . "/img_" . $id;
        /* check the image is empty or not #-start if */
        if (strlen($img['name']) != 0):
            if (!file_exists($homedir)) {
                mkdir($homedir, 0777, true);
                chmod($homedir, 0777);
            }
            if (!file_exists($this->homeUploaddir)) {
                mkdir($this->homeUploaddir, 0777, true);
                chmod($this->homeUploaddir, 0777);
            }
            /* Get the File extension by using getFileExtenstion function */
            $filetype = $this->getFileExtension($img['name']);
            $img_tmpname = $img['tmp_name'];
//            $output['imageURL'] = $this->request->webroot.$this->homeUploaddir . '/' . $img['name'];
            $output['imageURL'] = '/'.$this->homeUploaddir . '/' . $img['name'];
            $filetype = strtolower($filetype);
            $imageResize = $this->resizeImage($filetype, $img_tmpname, $this->homeUploaddir, $img);
            move_uploaded_file($img['tmp_name'], WWW_ROOT . $this->homeUploaddir . '/' . $img['name']);
            return $output;
        endif;
    }

     public function resizeImage($filetype, $img_tmpname, $homeuploaddir, $img) {
        /* Get the resource id based on the Image type */
        if ($filetype == 'jpg' || $filetype == 'jpeg') {
            $src = imagecreatefromjpeg($img_tmpname);
        } else if ($filetype == 'png') {
            $src = imagecreatefrompng($img_tmpname);
        }
        list($width, $height) = getimagesize($img_tmpname);
        /* Set required image size resizing */
        $images_width = ['150', '300', '800'];
        $j = 0;
        /* manipulate Image */
        for ($i = 0; $i < count($images_width); $i++) {
            $newwidth[$i] = $images_width[$i];
            $newheight[$j] = $images_width[$i];
            $tmp[$j] = imagecreatetruecolor($newwidth[$i], $newheight[$j]);
            $ext_[$j] = substr($img['name'], strrpos($img['name'], "."));
            $newfilename[$j] = basename($img['name'], $ext_[$j]) . "-$newwidth[$i]x$newwidth[$i]" . $ext_[$j];
            /* Resize and save images in folder */
            $filename[$j] = $homeuploaddir . '/' . $newfilename[$j];
            //chmod($filename[$j],777);
            imagecopyresampled($tmp[$j], $src, 0, 0, 0, 0, $newwidth[$i], $newwidth[$i], $width, $height);
            if ($filetype == 'jpg' || $filetype == 'jpeg') {
                imagejpeg($tmp[$j], $filename[$j], 100);
            } else {
                imagepng($tmp[$j], $filename[$j], 8);
            }
            imagedestroy($tmp[$j]);
            $j++;
        }
        imagedestroy($src);
    }

    public function deleteImage($id, $folderName) {
        /* Get the Directory path to delete folder */
        $this->homeUploaddir = "img/" . $folderName . "/img_" . $id;
        if (file_exists($this->homeUploaddir)) {
            $imagesList = array_diff(scandir($this->homeUploaddir), array('.', '..'));
            foreach ($imagesList as $image) {
                unlink($this->homeUploaddir . '/' . $image);
            }
            /* Delete the directory */
            rmdir($this->homeUploaddir);
        }
    }

    public function getFileExtension($str) {
        /* Get the image extension */
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }

    public function getImage($id, $filePath, $imageSize, $folderName) {

        if (!empty($filePath)) {
            $FileURL = $this->homeUploaddir = "img/" . $folderName . "/img_" . $id;
            $fileName = str_replace($FileURL, "", $filePath);
            $ext = substr($fileName, strrpos($fileName, "."));
            $imagePath = basename($fileName, $ext) . "-$imageSize" . 'x' . "$imageSize" . $ext;
            if (file_exists($this->homeUploaddir . '/' . $imagePath)) {
                return $this->request->webroot . $this->homeUploaddir . '/' . $imagePath;
            }
        } else {
            return $this->request->webroot . EMPTYIMAGE;
        }
    }

}
