<?php 

 namespace App\Serviecies;

 use Symfony\Component\HttpFoundation\File\UploadedFile;
 use App\Serviecies\UploadManagerPreSet;

 class ArticleSectionUploadManager extends UploadManagerPreSet
 {  
    private $filename;

    private $fileLocation;

    public function upload(UploadedFile $file)
    {
        $file -> move(
            $this->getParameter('sectionUploads'),
            $this->filename
        );
    }

    public function getFileName()
    {
        return $this->filename; 
    }

    public function setFileName(UploadedFile $file)
    {
        $filename = md5(uniqid()).$file->guessExtension();
        $this->setFileLocation();
    }

    public function getFileLocation()
    {
        return $this->fileLocation;
    }

    public function setFileLocation()
    {
        $this->fileLocation = $this->getParameter('sectionUploads').$this->filename;
    }
 }