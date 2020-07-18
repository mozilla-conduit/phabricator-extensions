<?php


class EmailRevisionReclaimed implements PublicEmailBody
{
  /** @var string|null */
  public $mainComment;
  /** @var EmailInlineComment[] */
  public $inlineComments;
  /** @var string */
  public $transactionLink;
  /** @var EmailRecipient[] */
  public $reviewers;

  /**
   * @param string|null $mainComment
   * @param EmailInlineComment[] $inlineComments
   * @param string $transactionLink
   * @param EmailRecipient[] $reviewers
   */
  public function __construct(?string $mainComment, array $inlineComments, string $transactionLink, array $reviewers)
  {
    $this->mainComment = $mainComment;
    $this->inlineComments = $inlineComments;
    $this->transactionLink = $transactionLink;
    $this->reviewers = $reviewers;
  }
}