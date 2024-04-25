<?php

declare(strict_types=1);

namespace AshAllenDesign\ShortURL\Tests\Unit\Models\ShortURLVisit;

use PHPUnit\Framework\Attributes\Test;
use AshAllenDesign\ShortURL\Models\ShortURL;
use AshAllenDesign\ShortURL\Models\ShortURLVisit;
use AshAllenDesign\ShortURL\Tests\Unit\TestCase;
use Carbon\Carbon;

final class CastsTest extends TestCase
{
    #[Test]
    public function carbon_date_objects_are_returned(): void
    {
        $shortUrlVisit = ShortURLVisit::factory()
            ->for(ShortURL::factory())
            ->create([
                'visited_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        $shortUrlVisit->refresh();

        $this->assertInstanceOf(Carbon::class, $shortUrlVisit->visited_at);
        $this->assertInstanceOf(Carbon::class, $shortUrlVisit->created_at);
        $this->assertInstanceOf(Carbon::class, $shortUrlVisit->updated_at);
    }
}
