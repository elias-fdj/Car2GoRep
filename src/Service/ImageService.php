<?php

namespace App\Service;

use App\Entity\Car;

class ImageService 
{
    public function CarImagePersist(Car $theCar)
        {
            $thePath = 'upload/cars';
            $theFile = $theCar->getPicture()->getFile();
            $theNewName = md5(uniqid()).'.'.$theFile->guessExtension();
            $theFile->move($thePath, $theNewName);
            $theCar->getPicture()->setNom($theNewName);
            $theCar->getPicture()->setUrl('/'.$thePath.'/'.$theNewName);
            
        }
}