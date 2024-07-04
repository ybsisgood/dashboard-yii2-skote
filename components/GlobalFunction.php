<?php

namespace app\components;

use Yii;
use yii\base\Component;
use ybsisgood\modules\UserManagement\models\User;
/**
 * This is the model class for table "maintenance".
 *
 * @property int $id
 * @property int $status
 * @property string|null $message
 */
class GlobalFunction extends Component {

    public function getUserName($id) {
        $user = User::find()->where(['id' => $id])->one();
        if (!$user) {
            return 'Unknown';
        }
        return $user->username;
    }
    
    public function getDateTime($time) {
        return date('H:i:s - d M Y', strtotime($time));
    }

    public static function slugify($text, string $divider = '-')
    {
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, $divider);
        $text = preg_replace('~-+~', $divider, $text);
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

}