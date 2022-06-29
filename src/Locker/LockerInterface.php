<?php
/**
 * Created for dibify
 * Date: 27.04.2021
 * @author Timur Kasumov (XAKEPEHOK)
 */

namespace DiBify\DiBify\Locker;


use DiBify\DiBify\Locker\Lock\Lock;
use DiBify\DiBify\Model\ModelInterface;

interface LockerInterface
{

    public function lock(ModelInterface $model, Lock $lock): bool;

    public function unlock(ModelInterface $model, Lock $lock): bool;

    public function passLock(ModelInterface $model, Lock $currentLock, Lock $lock): bool;

    public function waitForLock(array $models, int $waitTimeout, Lock $lock): bool;

    public function isLockedFor(ModelInterface $model, Lock $lock): bool;

    public function getLock(ModelInterface $model): ?Lock;

    public function getDefaultTimeout(): int;

}
