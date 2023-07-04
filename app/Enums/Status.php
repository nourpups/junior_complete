<?php

namespace App\Enums;

enum Status:string
{
    case IN_PROGRESS = 'In progress';
    case COMPLETED = 'Completed';
    case ABANDONED = 'Abandoned';

    public function isInProgress(): bool
    {
        return $this == self::IN_PROGRESS;
    }
    public function isCompleted(): bool
    {
        return $this == self::COMPLETED;
    }
    public function IsAbandoned(): bool
    {
        return $this == self::ABANDONED;
    }
    private function getLabelColor(): string
    {
        return match($this) {
            self::IN_PROGRESS => 'bg-primary',
            self::COMPLETED => 'bg-success',
            self::ABANDONED => 'bg-danger',
        };
    }
    public function getLabelHTML(): string {
        return sprintf('<span class="p-2 rounded text-white %s">%s</span>', $this->getLabelColor(), $this->value);
    }
}
