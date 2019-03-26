<?php

namespace backend\modules\leave\models;

use Yii;
###
use andahrm\leave\models\LeaveType;
use andahrm\person\models\Person;

/**
 * This is the model class for table "form_leave".
 *
 * @property int $id
 * @property string $year ปีงบประมาณ
 * @property string $to เรียน
 * @property int $user_id ผู้ยื่นลา
 * @property int $leave_type_id ประเภทการลา
 * @property string $contact ติดต่อ
 * @property string $date_start ตั้งแต่วันที่
 * @property int $start_part เริ่มช่วง
 * @property string $date_end ถึงวันที่
 * @property int $end_part สิ้นสุดช่วง
 * @property double $number_day จำนวนวัน
 * @property string $reason เหตุผล
 * @property int $acting_user_id ผู้ปฎิบัติราชการแทน
 * @property int $status สถานะ
 * @property string $commander_comment
 * @property int $commander_status
 * @property int $commander_by
 * @property int $commander_at
 * @property string $inspector_comment ความคิดเห็นผู้ตรวจสอบ
 * @property int $inspector_status สถานะ
 * @property int $inspector_by ผู้ตรวจสอบ
 * @property int $inspector_at วันที่
 * @property string $director_comment ความคิดเห็นผู้สั่งการ
 * @property int $director_status คำสั่ง
 * @property int $director_by ผู้ออกคำสั่ง
 * @property int $director_at วันที่
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property LeaveType $leaveType
 */
class FormLeave extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_leave';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year', 'leave_type_id', 'contact', 'date_start', 'date_end', 'number_day'], 'required'],
            [['year', 'date_start', 'date_end'], 'safe'],
            [['user_id', 'leave_type_id', 'start_part', 'end_part', 'acting_user_id', 'status', 'commander_status', 'commander_by', 'commander_at', 'inspector_status', 'inspector_by', 'inspector_at', 'director_status', 'director_by', 'director_at', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['number_day'], 'number'],
            [['reason'], 'string'],
            [['to', 'commander_comment', 'inspector_comment', 'director_comment'], 'string', 'max' => 255],
            [['contact'], 'string', 'max' => 200],
            [['leave_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => LeaveType::className(), 'targetAttribute' => ['leave_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('andahrm/leave', 'ID'),
            'year' => Yii::t('andahrm/leave', 'Year'),
            'to' => Yii::t('andahrm/leave', 'To'),
            'user_id' => Yii::t('andahrm/leave', 'User ID'),
            'leave_type_id' => Yii::t('andahrm/leave', 'Leave Type ID'),
            'contact' => Yii::t('andahrm/leave', 'Contact'),
            'date_start' => Yii::t('andahrm/leave', 'Date Start'),
            'start_part' => Yii::t('andahrm/leave', 'Start Part'),
            'date_end' => Yii::t('andahrm/leave', 'Date End'),
            'end_part' => Yii::t('andahrm/leave', 'End Part'),
            'number_day' => Yii::t('andahrm/leave', 'Number Day'),
            'reason' => Yii::t('andahrm/leave', 'Reason'),
            'acting_user_id' => Yii::t('andahrm/leave', 'Acting User ID'),
            'status' => Yii::t('andahrm/leave', 'Status'),
            'commander_comment' => Yii::t('andahrm/leave', 'Commander Comment'),
            'commander_status' => Yii::t('andahrm/leave', 'Commander Status'),
            'commander_by' => Yii::t('andahrm/leave', 'Commander By'),
            'commander_at' => Yii::t('andahrm/leave', 'Commander At'),
            'inspector_comment' => Yii::t('andahrm/leave', 'Inspector Comment'),
            'inspector_status' => Yii::t('andahrm/leave', 'Inspector Status'),
            'inspector_by' => Yii::t('andahrm/leave', 'Inspector By'),
            'inspector_at' => Yii::t('andahrm/leave', 'Inspector At'),
            'director_comment' => Yii::t('andahrm/leave', 'Director Comment'),
            'director_status' => Yii::t('andahrm/leave', 'Director Status'),
            'director_by' => Yii::t('andahrm/leave', 'Director By'),
            'director_at' => Yii::t('andahrm/leave', 'Director At'),
            'created_at' => Yii::t('andahrm/leave', 'Created At'),
            'created_by' => Yii::t('andahrm/leave', 'Created By'),
            'updated_at' => Yii::t('andahrm/leave', 'Updated At'),
            'updated_by' => Yii::t('andahrm/leave', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeaveType()
    {
        return $this->hasOne(LeaveType::className(), ['id' => 'leave_type_id']);
    }
}
