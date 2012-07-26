<?php
/**
 * An interface for a generic SCM providers
 * Consists of methods which must be implemented if you want
 * to extend a module with a support of your own SCM provider,
 * other than Github or Bitbucket (those are bundled)
 *
 * All classes derived from this one must be named
 * like: FoobarScmProvider
 * not:  FooBarScmProvider
 *
 * Same applies to file naming convention.
 */
interface ScmProvider
{
    /**
     * @var An API URL, like http://api.provider.com/
     * @return string
     */
    public function getApiURL();

    /**
     * Gets list of issues, associated with a repo
     * @abstract
     * @return mixed
     */
    public function getIssuesList();

    /**
     * Gets a single issue by ID
     * @abstract
     * @param $id Issue's ID
     * @return mixed
     */
    public function getIssue($id);

    /**
     * Creates an issue
     * @abstract
     * @param $title Title of the issue
     * @param $content Issue's content
     * @param null $type Type of issue (bug, enhancement, etc.) (may be omitted)
     * @param null $assignee Responsible person (may be omitted)
     * @param null $milestone Milestone (may be omitted)
     * @return mixed
     */
    public function createIssue($title, $content, $type = null, $assignee = null, $milestone = null);

    /**
     * Updates an issue
     * @abstract
     * @param $title
     * @param $content
     * @param null $type
     * @param null $assignee
     * @param null $milestone
     * @return mixed
     */
    public function updateIssue($title, $content, $type = null, $assignee = null, $milestone = null);

    /**
     * Get comments for an issue
     * @abstract
     * @param $issue_id Issue's id
     * @return mixed
     */
    public function listComments($issue_id);

    /**
     * Creates a comment for an issue
     * @abstract
     * @param $issue_id
     * @param $content
     * @return mixed
     */
    public function postComment($issue_id, $content);

    /**
     * Updates a comment for an issue
     * @abstract
     * @param $issue_id Issue's id
     * @param $comment_id Comment's id
     * @param $content
     * @return mixed
     */
    public function updateComment($comment_id, $content, $issue_id = null);

    /**
     * Deletes a specified comment
     * @abstract
     * @param $issue_id
     * @param $comment_id
     * @return mixed
     */
    public function deleteComment($comment_id, $issue_id = null);

    /**
     * Contructs operational URL
     * API URL + username + repo slug
     * @abstract
     * @return mixed
     */
    public function constructOpUrl();
}
