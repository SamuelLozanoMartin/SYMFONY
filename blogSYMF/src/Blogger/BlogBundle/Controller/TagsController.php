<?php
// src/Blogger/BlogBundle/Controller/TagsController.php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Blog controller.
 */
class TagsController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($blog_name)
    {
        $em = $this->getDoctrine()->getManager();

        $tags = $em->getRepository('BloggerBlogBundle:Blog')->findAll();

        if (!$tags) {
        throw $this->createNotFoundException('Unable to find Blog post.');
        }

    return $this->render('BloggerBlogBundle:Tags:show.html.twig', array(
        'blogtags'      => $tags,
        
    ));
    }
}