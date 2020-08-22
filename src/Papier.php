<?php

namespace Papier;

use Papier\File\FileHeader;
use Papier\File\FileTrailer;
use Papier\File\FileBody;

use Papier\File\CrossReference;


use RuntimeException;
use InvalidArgumentException;

class Papier
{
    /**
     * NUmber of decimals for real numbers
     *
     * @var int
     */
    const MAX_DECIMALS = 5;

     /**
     * Header
     *
     * @var \Papier\File\FileHeader
     */
    private $header;

     /**
     * Body
     *
     * @var \Papier\File\FileBody
     */
    private $body;

     /**
     * Trailer
     *
     * @var \Papier\File\FileTrailer
     */
    private $trailer;

    /**
     * Create a new Papier instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->header = new FileHeader();
        $this->trailer = new FileTrailer();
        $this->body = new FileBody();

        $this->setVersion(4);
    } 

    /**
     * Get header.
     *
     * @return \Papier\File\FileHeader
     */
    protected function getHeader()
    {
        return $this->header;
    }

    /**
     * Get body.
     *
     * @return \Papier\File\FileBody
     */
    protected function getBody()
    {
        return $this->body;
    }

    /**
     * Get trailer.
     *
     * @return \Papier\File\FileTrailer
     */
    protected function getTrailer()
    {
        return $this->trailer;
    }

    /**
     * Set PDF version.
     *  
     * @param  int  $version
     * @throws InvalidArgumentException if the provided argument is not a valid version.
     * @return \Papier\Papier
     */
    public function setVersion($version)
    {
        $this->getHeader()->setVersion($version);
        return $this;
    } 


    /**
     * Add page to PDF's content.
     *
     * @return \Papier\Type\PageObjectType
     */
    public function addPage()
    {
        $page = $this->getBody()->addPage();
        return $page;
    } 

    /**
     * Build PDF's content.
     *
     * @return string
     */
    public function build()
    {
        $this->check();
        
        $header = $this->getHeader();
        $body = $this->getBody();
        $trailer = $this->getTrailer();
        
        $trailer->setRoot($body->getDocumentCatalog());

        $crossreference = CrossReference::getInstance();

        $content  = $header->write();

        $crossreference->setOffset(strlen($content));

        $content .= $body->format();

        $trailer->setCrossReferenceOffset(strlen($content));

        $content .= $crossreference->write();
        $content .= $trailer->write();

        return $content;
    }

     /**
     * Save PDF's content.
     *
     * @return string
     */
    public function save($filename)
    {
        $content = $this->build();
           
        return file_put_contents($filename, trim($content)) !== false;
    } 

    /**
     * Check if component can be build.
     *
     * @return bool
     */
    public function check()
    {
        return true;
    }
}