<?php declare(strict_types=1);

namespace Kalessil\Composer\Plugins\ProductionDependenciesGuard\Inspectors;

use Composer\Package\CompletePackageInterface as PackageContract;
use PHPUnit\Framework\TestCase;

final class ByPackageAbandonedInspectorTest extends TestCase
{
    /** @covers \Kalessil\Composer\Plugins\ProductionDependenciesGuard\Inspectors\ByPackageAbandonedInspector::<public> */
    public function testComponent()
    {
        $mock = $this->createMock(PackageContract::class);
        $mock->expects($this->atLeastOnce())->method('isAbandoned')->willReturn(true, false);

        $component = new ByPackageAbandonedInspector();
        $this->assertFalse($component->canUse($mock));
        $this->assertTrue($component->canUse($mock));
    }
}