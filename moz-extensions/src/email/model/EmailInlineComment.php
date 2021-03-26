<?php


class EmailInlineComment {
  public string $fileContext;
  public string $link;
  /** @deprecated */
  public string $text;
  public EmailCommentMessage $message;
  /** "reply" if context is EmailReplyContext, otherwise "code" */
  public string $contextKind;
  /** @var EmailReplyContext|EmailCodeContext */
  public $context;

  public function __construct(string $fileContext, string $link, EmailCommentMessage $message, string $contextKind, $context) {
    $this->fileContext = $fileContext;
    $this->link = $link;
    $this->text = $message->asText;
    $this->message = $message;
    $this->contextKind = $contextKind;
    $this->context = $context;
  }
}