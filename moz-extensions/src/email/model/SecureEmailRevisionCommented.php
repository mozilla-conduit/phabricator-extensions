<?php


class SecureEmailRevisionCommented implements SecureEmailBody
{
  /** @var EmailRecipient[] */
  public $reviewers;
  /** @var EmailRecipient|null */
  public $author;
  /** @var string */
  public $transactionLink;

  /**
   * @param EmailRecipient[] $reviewers
   * @param EmailRecipient|null $author
   * @param string $transactionLink
   */
  public function __construct(array $reviewers, ?EmailRecipient $author, string $transactionLink) {
    $this->reviewers = $reviewers;
    $this->author = $author;
    $this->transactionLink = $transactionLink;
  }
}