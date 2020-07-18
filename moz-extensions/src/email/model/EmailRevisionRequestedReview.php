<?php


class EmailRevisionRequestedReview implements PublicEmailBody
{
  /** @var string|null */
  public $mainComment;
  /** @var EmailInlineComment[] */
  public $inlineComments;
  /** @var string */
  public $transactionLink;
  /** @var EmailReviewer[] */
  public $reviewers;

  /**
   * @param string|null $mainComment
   * @param EmailInlineComment[] $inlineComments
   * @param string $transactionLink
   * @param EmailReviewer[] $reviewers
   */
  public function __construct(?string $mainComment, array $inlineComments, string $transactionLink, array $reviewers)
  {
    $this->mainComment = $mainComment;
    $this->inlineComments = $inlineComments;
    $this->transactionLink = $transactionLink;
    $this->reviewers = $reviewers;
  }
}