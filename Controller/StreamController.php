<?php

namespace Debril\RssAtomBundle\Controller;

use \DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class StreamController extends Controller
{

    /**
     * @Route("/stream")
     * @Template()
     */
    public function indexAction($contentId)
    {

        $formatter = $this->getFormatter();

        $content = $this->getContent($contentId);

        return $formatter->toString($content);
    }

    /**
     *
     * @param mixed $contentId
     */
    protected function getContent($contentId)
    {
        $provider = $this->get('FeedContentProvider');

        return $provider->getFeedContentById($contentId);
    }

    /**
     *
     * @return Debril\RssAtomBundle\Protocol\FeedFormatter
     */
    protected function getFormatter()
    {
        return $this->get('FeedFormatter');
    }

}
