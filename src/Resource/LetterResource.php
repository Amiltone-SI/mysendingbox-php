<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

final class LetterResource
{
    /**
     * @param array<TrackingEventResource> $trackingEvents
     * @param array<EventResource> $events
     * @param array<string, mixed>|null $metadata
     * @param array<string, mixed>|null $variables
     */
    public function __construct(
        private string $id,
        private string $channel,
        private PriceResource $price,
        private ?AddressResource $from,
        private AddressResource $to,
        private int $pageCount,
        private int $sheetCount,
        private FileResource|string|null $fileResource,
        private ?string $sourceFiletype,
        private string $mode,
        private string $color,
        private bool $bothSides,
        private string $postageType,
        private string $postageSpeed,
        private ?int $pdfMargin,
        private bool $manageDeliveryProof,
        private bool $manageReturnedMail,
        private string $envelopeWindow,
        private string $mailProvider,
        private bool $printSenderAddress,
        private string $addressPlacement,
        private string $envelope,
        private bool $staple,
        private string $sendDate,
        private FileResource|string|null $deliveryProof,
        private FileResource|string|null $filingProof,
        private FileResource|string|null $lostProof,
        private FileResource|string|null $returnToSenderProof,
        private FileResource|string|null $downloadProof,
        private FileResource|string|null $rejectionProof,
        private FileResource|string|null $negligenceProof,
        private array $trackingEvents,
        private ?string $trackingNumber,
        private array $events,
        private string $createdAt,
        private string $deletedAt,
        private string $user,
        private ?bool $error,
        private ?bool $wrongAddress,
        private string $createdFrom,
        private string $object,
        private ?string $description,
        private ?string $content,
        private ?string $contentType,
        private ?bool $termOfUseValidation,
        private ?array $metadata,
        private ?array $variables,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getChannel(): string
    {
        return $this->channel;
    }

    public function getPrice(): PriceResource
    {
        return $this->price;
    }

    public function getFrom(): ?AddressResource
    {
        return $this->from;
    }

    public function getTo(): AddressResource
    {
        return $this->to;
    }

    public function getPageCount(): int
    {
        return $this->pageCount;
    }

    public function getSheetCount(): int
    {
        return $this->sheetCount;
    }

    public function getFileResource(): FileResource|string|null
    {
        return $this->fileResource;
    }

    public function getSourceFiletype(): ?string
    {
        return $this->sourceFiletype;
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function isBothSides(): bool
    {
        return $this->bothSides;
    }

    public function getPostageType(): string
    {
        return $this->postageType;
    }

    public function getPostageSpeed(): string
    {
        return $this->postageSpeed;
    }

    public function getPdfMargin(): ?int
    {
        return $this->pdfMargin;
    }

    public function isManageDeliveryProof(): bool
    {
        return $this->manageDeliveryProof;
    }

    public function isManageReturnedMail(): bool
    {
        return $this->manageReturnedMail;
    }

    public function getEnvelopeWindow(): string
    {
        return $this->envelopeWindow;
    }

    public function getMailProvider(): string
    {
        return $this->mailProvider;
    }

    public function isPrintSenderAddress(): bool
    {
        return $this->printSenderAddress;
    }

    public function getAddressPlacement(): string
    {
        return $this->addressPlacement;
    }

    public function getEnvelope(): string
    {
        return $this->envelope;
    }

    public function getStaple(): bool
    {
        return $this->staple;
    }

    public function getSendDate(): string
    {
        return $this->sendDate;
    }

    public function getDeliveryProof(): FileResource|string|null
    {
        return $this->deliveryProof;
    }

    public function getFilingProof(): FileResource|string|null
    {
        return $this->filingProof;
    }

    public function getLostProof(): FileResource|string|null
    {
        return $this->lostProof;
    }

    public function getReturnToSenderProof(): FileResource|string|null
    {
        return $this->returnToSenderProof;
    }

    public function getDownloadProof(): FileResource|string|null
    {
        return $this->downloadProof;
    }

    public function getRejectionProof(): FileResource|string|null
    {
        return $this->rejectionProof;
    }

    public function getNegligenceProof(): FileResource|string|null
    {
        return $this->negligenceProof;
    }

    /**
     * @return array<TrackingEventResource>
     */
    public function getTrackingEvents(): array
    {
        return $this->trackingEvents;
    }

    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    /**
     * @return array<EventResource>
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getDeletedAt(): string
    {
        return $this->deletedAt;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function isError(): ?bool
    {
        return $this->error;
    }

    public function isWrongAddress(): ?bool
    {
        return $this->wrongAddress;
    }

    public function getCreatedFrom(): string
    {
        return $this->createdFrom;
    }

    public function getObject(): string
    {
        return $this->object;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    public function isTermOfUseValidation(): ?bool
    {
        return $this->termOfUseValidation;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getVariables(): ?array
    {
        return $this->variables;
    }
}
