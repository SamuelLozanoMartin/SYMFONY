<?php
// src/Blogger/BlogBundle/Controller/BlogController.php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Blog controller.
 */
class BlogController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id,$slug)
    {
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);

        if (!$blog) {
        throw $this->createNotFoundException('Unable to find Blog post.');
        }

    $comments = $em->getRepository('BloggerBlogBundle:Comment')
                   ->getCommentsForBlog($blog->getId());

    return $this->render('BloggerBlogBundle:Blog:show.html.twig', array(
        'blog'      => $blog,
        'comments'  => $comments
    ));
    }

    public function blog_tagsAction($tags_name)
    {
        $em = $this->getDoctrine()->getManager();

         $tags = $em->getRepository('BloggerBlogBundle:Blog')->findByTags($tags_name);
        if (!$tags) {
        throw $this->createNotFoundException('Unable to find Blog post.');
        }

    /*$comments = $em->getRepository('BloggerBlogBundle:Comment')
                   ->getCommentsForBlog($blog->getId());*/

    return $this->render('BloggerBlogBundle:Blog:show.html.twig', array(
        /*'comments'  => $comments,*/
        'tags'   =>$tags
    ));
    }


}