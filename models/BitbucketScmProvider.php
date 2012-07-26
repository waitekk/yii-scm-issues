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
     * @return mixed|string
     */
    public function constructOpUrl()
    {
        return $this->_apiURL.'repositories/'.Yii::app()->modules['issues']['username'].'/'.Yii::app()->modules['issues']['repoSlug'].'/';
    }

    /**
     * Gets list of issues, associated with a repo
     * @return mixed
     */
    public function getIssuesList()
    {
        $opUrl = $this->constructOpUrl();
        $opUrl .= 'issues/';

        $result = CurlWrapper::getResult($opUrl);

        if($result != 'Not Found')
        {
            $arrayResult = json_decode($result, true);

            $issues = array();

            for($i = 0; $i < count($arrayResult['issues']); $i++)
            {
                $issue = $arrayResult['issues'][$i];

                $issues[$i]['number'] = $issue['local_id'];
                $issues[$i]['title'] = $issue['title'];
                $issues[$i]['content'] = $issue['content'];
                $issues[$i]['comments'] = $issue['comment_count'];
                $issues[$i]['assignee'] = $issue->assignee;
                $issues[$i]['id'] = $issue->id;
                $issues[$i]['state'] = $issue['status'];
                $issues[$i]['url'] = $issue->url;
                $issues[$i]['created_at'] = $issue['created_on'];
                $issues[$i]['user']['username'] = $issue['reported_by']['username'];
                $issues[$i]['user']['url'] = '#';
                $issues[$i]['user']['first_name'] = $issue['reported_by']['first_name'];
                $issues[$i]['user']['last_name'] = $issue['reported_by']['last_name'];
            }
        } else {
            throw new CException(Yii::t('issues', 'Failed to get issues'));
        }

        $dataProvider = new CArrayDataProvider($issues, array('keyField'=>'number'));

        return $dataProvider;
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
