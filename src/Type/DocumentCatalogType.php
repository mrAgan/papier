<?php

namespace Papier\Type;

use InvalidArgumentException;
use Papier\Factory\Factory;
use Papier\Object\ArrayObject;
use Papier\Object\NameObject;
use Papier\Object\StreamObject;
use Papier\Type\Base\DictionaryType;
use Papier\Validator\BooleanValidator;
use Papier\Validator\PageLayoutValidator;
use Papier\Validator\PageModeValidator;
use Papier\Validator\StringValidator;
use RuntimeException;

class DocumentCatalogType extends DictionaryType
{
    /**
     * Set PDF version.
     *  
     * @param NameObject $version
     * @return DocumentCatalogType
     */
    public function setVersion(NameObject $version): DocumentCatalogType
    {
        $this->setEntry('Version', $version);
        return $this;
    } 

    /**
     * Set extensions.
     *  
     * @param  ExtensionsDictionaryType  $extensions
     * @return DocumentCatalogType
     */
    public function setExtensions(ExtensionsDictionaryType $extensions): DocumentCatalogType
    {
        $this->setEntry('Extensions', $extensions);
        return $this;
    } 

    /**
     * Get extensions.
     *  
     * @return ExtensionsDictionaryType
     */
    public function getExtensions(): ExtensionsDictionaryType
    {
        if (!$this->hasEntry('Extensions')) {
			$extensions = Factory::create('Papier\Type\ExtensionsDictionaryType', null, true);
            $this->setExtensions($extensions);
        }

		/** @var ExtensionsDictionaryType $extensions */
		$extensions = $this->getEntry('Extensions');
        return $extensions;
    }

    /**
     * Set page tree node (root of document's page tree).
     *  
     * @param DictionaryType $pages
     * @return DocumentCatalogType
     */
    public function setPages(DictionaryType $pages): DocumentCatalogType
    {
        $this->setEntry('Pages', $pages);
        return $this;
    }
  
    /**
     * Set page tree node (root of document's page tree).
     *  
     * @param  NumberTreeType  $labels
     * @return DocumentCatalogType
     */
    public function setPageLabels(NumberTreeType $labels): DocumentCatalogType
    {
        $this->setEntry('PageLabels', $labels);
        return $this;
    }

    /**
     * Set document's name dictionary.
     *  
     * @param DictionaryType $names
     * @return DocumentCatalogType
     */
    public function setNames(DictionaryType $names): DocumentCatalogType
    {
        $this->setEntry('Names', $names);
        return $this;
    } 

    /**
     * Set names and corresponding destinations.
     *  
     * @param DictionaryType $dests
     * @return DocumentCatalogType
     */
    public function setDests(DictionaryType $dests): DocumentCatalogType
    {
        $this->setEntry('Dests', $dests);
        return $this;
    } 

    /**
     * Set viewer preferences.
     *  
     * @param DictionaryType $preferences
     * @return DocumentCatalogType
     */
    public function setViewerPreferences(DictionaryType $preferences): DocumentCatalogType
    {
        $this->setEntry('ViewerPreferences', $preferences);
        return $this;
    } 

    /**
     * Get viewer preferences.
     *  
     * @return ViewerPreferencesDictionaryType
     */
    public function getViewerPreferences(): ViewerPreferencesDictionaryType
    {
        if (!$this->hasEntry('ViewerPreferences')) {
            $viewerPreferences = Factory::create('Papier\Type\ViewerPreferencesDictionaryType', null, true);
            $this->setViewerPreferences($viewerPreferences);
        }

		/** @var ViewerPreferencesDictionaryType $viewerPreferences */
		$viewerPreferences = $this->getEntry('ViewerPreferences');
        return $viewerPreferences;
    } 

    /**
     * Set page layout.
     *  
     * @param  string  $layout
     * @return DocumentCatalogType
     * @throws InvalidArgumentException if the provided argument is not a valid layout.
     */
    public function setPageLayout(string $layout): DocumentCatalogType
    {
        if (!PageLayoutValidator::isValid($layout)) {
            throw new InvalidArgumentException("Layout is incorrect. See ".__CLASS__." class's documentation for possible values.");
        }

        $value = Factory::create('Papier\Type\Base\NameType', $layout);
        $this->setEntry('PageLayout', $value);

        return $this;
    } 

    /**
     * Set page mode.
     *  
     * @param  string  $mode
     * @return DocumentCatalogType
     * @throws InvalidArgumentException if the provided argument is not a valid mode.
     */
    public function setPageMode(string $mode): DocumentCatalogType
    {
        if (!PageModeValidator::isValid($mode)) {
            throw new InvalidArgumentException("Mode is incorrect. See ".__CLASS__." class's documentation for possible values.");
        }

        $value = Factory::create('Papier\Type\Base\NameType', $mode);
        $this->setEntry('PageMode', $value);

        return $this;
    } 

    /**
     * Set outlines.
     *  
     * @param DictionaryType $outlines
     * @return DocumentCatalogType
     */
    public function setOutlines(DictionaryType $outlines): DocumentCatalogType
    {
        $this->setEntry('Outlines', $outlines);
        return $this;
    } 

    /**
     * Set threads.
     *  
     * @param ArrayObject $threads
     * @return DocumentCatalogType
     */
    public function setThreads(ArrayObject $threads): DocumentCatalogType
    {
        $this->setEntry('Threads', $threads);
        return $this;
    } 

    /**
     * Set open action.
     *  
     * @param  mixed  $action
     * @return DocumentCatalogType
     * @throws InvalidArgumentException if the provided argument is not of type 'ArrayObject' or 'DictionaryType'.
     */
    public function setOpenAction($action): DocumentCatalogType
    {
        if (!$action instanceof ArrayObject && !$action instanceof DictionaryType) {
            throw new InvalidArgumentException("Action is incorrect. See ".__CLASS__." class's documentation for possible values.");
        }

        $this->setEntry('OpenAction', $action);
        return $this;
    } 

    /**
     * Set additional actions.
     *  
     * @param DictionaryType $aa
     * @return DocumentCatalogType
     */
    public function setAA(DictionaryType $aa): DocumentCatalogType
    {
        $this->setEntry('AA', $aa);
        return $this;
    } 

    /**
     * Set URI.
     *  
     * @param  DictionaryType $uri
     * @return DocumentCatalogType
     */
    public function setURI(DictionaryType $uri): DocumentCatalogType
    {
        $this->setEntry('URI', $uri);
        return $this;
    } 

    /**
     * Set interactive form.
     *  
     * @param  DictionaryType $form
     * @return DocumentCatalogType
     */
    public function setAcroForm(DictionaryType $form): DocumentCatalogType
    {
        $this->setEntry('AcroForm', $form);
        return $this;
    } 

    /**
     * Set metadata.
     *  
     * @param StreamObject $metadata
     * @return DocumentCatalogType
     */
    public function setMetadata(StreamObject $metadata): DocumentCatalogType
    {
        $this->setEntry('Metadata', $metadata);
        return $this;
    } 

    /**
     * Set document's structure tree root.
     *  
     * @param  DictionaryType $structTreeRoot
     * @return DocumentCatalogType
     */
    public function setStructTreeRoot(DictionaryType $structTreeRoot): DocumentCatalogType
    {
        $this->setEntry('StructTreeRoot', $structTreeRoot);
        return $this;
    }


    /**
     * Set mark information.
     *  
     * @param  DictionaryType $markInfo
     * @return DocumentCatalogType
     */
    public function setMarkInfo(DictionaryType $markInfo): DocumentCatalogType
    {
        $this->setEntry('MarkInfo', $markInfo);
        return $this;
    }

    /**
     * Set document's language.
     *  
     * @param  string  $lang
     * @throws InvalidArgumentException if the provided argument is not of type 'StringObject'.
     * @return DocumentCatalogType
     */
    public function setLang(string $lang): DocumentCatalogType
    {
        if (!StringValidator::isValid($lang)) {
            throw new InvalidArgumentException("Lang is incorrect. See ".__CLASS__." class's documentation for possible values.");
        }

        $value = Factory::create('Papier\Type\Base\StringType', $lang);

        $this->setEntry('Lang', $value);
        return $this;
    }

    /**
     * Set spider info.
     *  
     * @param  DictionaryType $spiderInfo
     * @return DocumentCatalogType
     */
    public function setSpiderInfo(DictionaryType $spiderInfo): DocumentCatalogType
    {
        $this->setEntry('SpiderInfo', $spiderInfo);
        return $this;
    }

    /**
     * Set output intents.
     *  
     * @param ArrayObject $outputIntents
     * @return DocumentCatalogType
     */
    public function setOutputIntents(ArrayObject $outputIntents): DocumentCatalogType
    {
        $this->setEntry('OutputIntents', $outputIntents);
        return $this;
    } 

    /**
     * Set piece info.
     *  
     * @param  DictionaryType $pieceInfo
     * @return DocumentCatalogType
     */
    public function setPieceInfo(DictionaryType $pieceInfo): DocumentCatalogType
    {
        $this->setEntry('PieceInfo', $pieceInfo);
        return $this;
    }

    /**
     * Set OC properties.
     *  
     * @param  DictionaryType $ocProperties
     * @return DocumentCatalogType
     */
    public function setOCProperties(DictionaryType $ocProperties): DocumentCatalogType
    {
        $this->setEntry('OCProperties', $ocProperties);
        return $this;
    }

    /**
     * Set permissions.
     *  
     * @param  DictionaryType $perms
     * @return DocumentCatalogType
     */
    public function setPerms(DictionaryType $perms): DocumentCatalogType
    {
        $this->setEntry('Perms', $perms);
        return $this;
    }

    /**
     * Set legal.
     *  
     * @param  DictionaryType $legal
     * @return DocumentCatalogType
     */
    public function setLegal(DictionaryType $legal): DocumentCatalogType
    {
        $this->setEntry('Legal', $legal);
        return $this;
    }

    /**
     * Set requirements.
     *  
     * @param  ArrayObject $requirements
     * @return DocumentCatalogType
     */
    public function setRequirements(ArrayObject $requirements): DocumentCatalogType
    {
        $this->setEntry('Requirements', $requirements);
        return $this;
    } 

     /**
     * Set collection.
     *  
     * @param  DictionaryType $collection
     * @return DocumentCatalogType
     */
    public function setCollection(DictionaryType $collection): DocumentCatalogType
    {
        $this->setEntry('Collection', $collection);
        return $this;
    }

    /**
     * Set needs rendering.
     *  
     * @param  bool  $needs
     * @throws InvalidArgumentException if the provided argument is not of type 'bool'.
     * @return DocumentCatalogType
     */
    public function setNeedsRendering(bool $needs): DocumentCatalogType
    {
        if (!BooleanValidator::isValid($needs)) {
            throw new InvalidArgumentException("NeedsRendering is incorrect. See ".__CLASS__." class's documentation for possible values.");
        }

        $value = Factory::create('Papier\Type\Base\BooleanType', $needs);
        $this->setEntry('NeedsRendering', $value);
        return $this;
    }

    /**
     * Format catalog's content.
     *
     * @return string
     */
    public function format(): string
    {
        if (!$this->hasEntry('Pages')) {
            throw new RuntimeException("Pages is missing. See ".__CLASS__." class's documentation for possible values.");
        }

        $type = Factory::create('Papier\Type\Base\NameType', 'Catalog');
        $this->setEntry('Type', $type);
        
        return parent::format();
    }
}