<?php


namespace app\models;


use yii\web\BadRequestHttpException;

class Users extends \app\models\base\Users
{

    /**
     * @param $userName
     * @param $groupName
     * @return bool
     * @throws BadRequestHttpException
     */
    public function create($userName, $groupName)
    {
        $this->name = $userName;
        $this->register_date = date('Y-m-d');
        $this->group_id = Groups::getGroupId($groupName);
        if (!$this->save()) {
            throw new BadRequestHttpException(json_encode($this->getErrors()));
        }

        return true;
    }

    public static function getTwoLastUsersInAllGroups()
    {
        $groupIds = Groups::find()
            ->select('id')
            ->column();

        if (!empty($groupIds)) {
            $result = [];
            $query = self::find();
            foreach ($groupIds as $groupId) {
                $groupName = Groups::findOne($groupId)->name;
                $newQuery = clone $query;
                $result[$groupName] = $newQuery->where(['group_id' => $groupId])
                    ->orderBy(['register_date' => SORT_DESC])
                    ->limit(2)
                    ->all();
            }

            return $result;
        }

        return [];

    }
}