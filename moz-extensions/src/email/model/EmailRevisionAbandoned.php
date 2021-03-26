<?php


class EmailRevisionAbandoned implements PublicEmailBody
{
  /** @deprecated */
  public ?string $mainComment;
  public ?EmailCommentMessage $mainCommentMessage;
  /** @var EmailInlineComment[] */
  public array $inlineComments;
  public string $transactionLink;
  /** @var EmailRecipient[] */
  public array $reviewers;

  /**
   * @param EmailCommentMessage|null $mainCommentMessage
   * @param EmailInlineComment[] $inlineComments
   * @param string $transactionLink
   * @param EmailRecipient[] $reviewers
   */
  public function __construct(?EmailCommentMessage $mainCommentMessage, array $inlineComments, string $transactionLink, array $reviewers)
  {
    $this->mainComment = $mainCommentMessage ? $mainCommentMessage->asText : null;
    $this->mainCommentMessage = $mainCommentMessage;
    $this->inlineComments = $inlineComments;
    $this->transactionLink = $transactionLink;
    $this->reviewers = $reviewers;
  }
}