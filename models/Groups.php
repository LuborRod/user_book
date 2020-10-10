<?php


namespace app\models;


class Groups extends \app\models\base\Groups
{

    /**
     * @param $groupName
     * @return int
     */
    public static function getGroupId($groupName)
    {
        $group = self::findOne(['name' => $groupName]);

        if (!empty($group)) {
            return $group->id;
        }

        $newGroup = self::create($groupName);

        return $newGroup->id;
    }

    /**
     * @param $groupName
     * @return Groups
     */
    public static function create($groupName)
    {
        $group = new Groups();
        $group->name = $groupName;
        $group->save();

        return $group;
    }

}