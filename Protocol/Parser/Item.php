<?php

/**
 * Rss/Atom Bundle for Symfony 2
 *
 * @package RssAtomBundle\Protocol
 *
 * @license http://opensource.org/licenses/lgpl-3.0.html LGPL
 * @copyright (c) 2013, Alexandre Debril
 *
 */

namespace Debril\RssAtomBundle\Protocol\Parser;

use \DateTime;

class Item implements \Debril\RssAtomBundle\Protocol\Item, \Debril\RssAtomBundle\Protocol\AtomItem
{

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $summary;

    /**
     * RSS : description
     * ATOM : Content
     *
     * @var string
     */
    protected $description;

    /**
     * @var DateTime
     */
    protected $updated;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $link;

    /**
     *
     * @var \Debril\RssAtomBundle\Protocol\Author
     */
    protected $author;

    /**
     *
     * @var string
     */
    protected $comment;

    /**
     *
     * @var string
     */
    protected $contentType;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return \Debril\RssAtomBundle\Protocol\Item
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return \Debril\RssAtomBundle\Protocol\Item
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @param string $description
     * @return \Debril\RssAtomBundle\Protocol\Item
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param unknown_type $summary
     * @return \Debril\RssAtomBundle\Protocol\Item
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param DateTime $updated
     * @return \Debril\RssAtomBundle\Protocol\Item
     */
    public function setUpdated(DateTime $updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param unknown_type $link
     * @return \Debril\RssAtomBundle\Protocol\Item
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     *
     * @param string $author
     * @return \Debril\RssAtomBundle\Protocol\Item
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     *
     * @param string $comment
     * @return \Debril\RssAtomBundle\Protocol\Item
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     *
     * @param string $type
     * @return \Debril\RssAtomBundle\Protocol\Parser\Item
     */
    public function setContentType($type)
    {
        $this->contentType = $type;

        return $this;
    }

}

