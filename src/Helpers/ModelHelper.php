<?php
/**
 * Created for dibify
 * Date: 06.04.2021
 * @author Timur Kasumov (XAKEPEHOK)
 */

namespace DiBify\DiBify\Helpers;


use DiBify\DiBify\Exceptions\DuplicateModelException;
use DiBify\DiBify\Exceptions\NotPermanentIdException;
use DiBify\DiBify\Model\ModelInterface;

class ModelHelper
{

    /**
     * @param ModelInterface[] $models
     * @return ModelInterface[]
     * @throws NotPermanentIdException
     * @throws DuplicateModelException
     */
    public static function indexById(array $models): array
    {
        $indexed = [];
        foreach ($models as $model) {

            if (!$model->id()->isAssigned()) {
                throw new NotPermanentIdException('Array of models can not be indexed by non-permanent id');
            }

            $indexed["{$model->id()}"] = $model;
        }

        if (count($models) !== count($indexed)) {
            throw new DuplicateModelException('Few models in array has same id');
        }

        return $indexed;
    }

}