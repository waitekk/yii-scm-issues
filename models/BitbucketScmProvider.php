<?php

/**
 * A so-called model file for a Bitbucket SCM provider
 */

class BitbucketScmProvider implements ScmProvider
{
    private $_apiURL = 'https://api.bitbucket.org/1.0/';

    /**
     * @var An API URL, like http://api.provider.com/
     * @return string
     */
    public function getApiURL()
    {
        return $this->_apiURL;
    }

    /**
     * Gets list of issues, associated with a repo
     * @return mixed
     */
    public function getIssuesList()
    {
        // TODO: Implement getIssuesList() method.
    }

    /**
     * Gets a single issue by ID
     * @param $id Issue's ID
     * @return mixed
     */
    public function getIssue($id)
    {
        // TODO: Implement getIssue() method.
    }

    /**
     * Creates an issue
     * @param $title Title of the issue
     * @param $content Issue's content
     * @param null $type Type of issue (bug, enhancement, etc.) (may be omitted)
     * @param null $assignee Responsible person (may be omitted)
     * @param null $milestone Milestone (may be omitted)
     * @return mixed
     */
    public function createIssue($title, $content, $type = null, $assignee = null, $milestone = null)
    {
        // TODO: Implement createIssue() method.
    }

    /**
     * Updates an issue
     * @param $title
     * @param $content
     * @param null $type
     * @param null $assignee
     * @param null $milestone
     * @return mixed
     */
    public function updateIssue($title, $content, $type = null, $assignee = null, $milestone = null)
    {
        // TODO: Implement updateIssue() method.
    }

    /**
     * Get comments for an issue
     * @param $issue_id Issue's id
     * @return mixed
     */
    public function listComments($issue_id)
    {
        // TODO: Implement listComments() method.
    }

    /**
     * Creates a comment for an issue
     * @param $issue_id
     * @param $content
     * @return mixed
     */
    public function postComment($issue_id, $content)
    {
        // TODO: Implement postComment() method.
    }

    /**
     * Updates a comment for an issue
     * @param $issue_id Issue's id
     * @param $comment_id Comment's id
     * @param $content
     * @return mixed
     */
    public function updateComment($comment_id, $content, $issue_id = null)
    {
        // TODO: Implement updateComment() method.
    }

    /**
     * Deletes a specified comment
     * @param $issue_id
     * @param $comment_id
     * @return mixed
     */
    public function deleteComment($comment_id, $issue_id = null)
    {
        // TODO: Implement deleteComment() method.
    }

}
