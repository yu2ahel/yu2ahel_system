<?php

namespace App\Listeners;

use App\Events\FirmAdminCreatedEvent;
use App\Models\UserGroup;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class AddDataForFirmAdmin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(FirmAdminCreatedEvent $event)
    {
        $firmId = $event->firmId;

        $technical = new UserGroup;
        $technical->name = "فني";
        $technical->description = "مسؤولين الأمور الفنية بالمركز";
        $technical->created_at = date("Y-m-d H:i:s");
        $technical->updated_at = date("Y-m-d H:i:s");
        $technical->deleted_at = null;
        $technical->firm_id = $firmId;
        $technical->save();

        $administrative = new UserGroup;
        $administrative->name = "إداري";
        $administrative->description = "مسؤولين الأمور اﻹدارية";
        $administrative->created_at = date("Y-m-d H:i:s");
        $administrative->updated_at = date("Y-m-d H:i:s");
        $administrative->deleted_at = null;
        $administrative->firm_id = $firmId;
        $administrative->save();

        $employee = new UserGroup;
        $employee->name = "عاملين";
        $employee->description = "مسؤولين النظافة والرعاية";
        $employee->created_at = date("Y-m-d H:i:s");
        $employee->updated_at = date("Y-m-d H:i:s");
        $employee->deleted_at = null;
        $employee->firm_id = $firmId;
        $employee->save();


        DB::table('user_type')->insert(
            [
                'name'=>"طبيب",
                'description'=>"الكشف وتقييم المستفيدين",
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s"),
                'deleted_at'=>null,
                'user_group_id'=>$technical->id,
            ],
        );
        DB::table('user_type')->insert(
            [
                'name'=>"سكرتارية",
                'description'=>"مسؤولين الاستقبال وادخال بيانات المستفيدين",
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s"),
                'deleted_at'=>null,
                'user_group_id'=>$administrative->id,
            ],
        );
        DB::table('user_type')->insert(
        [
              'name'=>"دادة",
              'description'=>"مسؤولين رعاية الأطفال",
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s"),
              'deleted_at'=>null,
              'user_group_id'=>$employee->id,
            ],
        );

        DB::table('services')->insert(
            [
                'name'=>"الجلسات",
                'description'=>"جلسات للأطفال وتأهيل نفسي",
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s"),
                'deleted_at'=>null,
                'firm_id'=>$firmId,
                'percentage_discount_for_group_service'=>10,
                'is_schedulable'=>0,
                'is_plannable'=>0,
                'is_attendable'=>0,
            ],
        );
        DB::table('services')->insert(
            [
                'name'=>"الكشوفات",
                'description'=>"الكشف نفسي",
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s"),
                'deleted_at'=>null,
                'firm_id'=>$firmId,
                'percentage_discount_for_group_service'=>10,
                'is_schedulable'=>0,
                'is_plannable'=>0,
                'is_attendable'=>0,
            ],
        );
        DB::table('services')->insert(
            [
              'name'=>"دراسة الحالة",
              'description'=>"وصف دراسة الحالة",
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s"),
              'deleted_at'=>null,
              'firm_id'=>$firmId,
              'percentage_discount_for_group_service'=>10,
              'is_schedulable'=>0,
              'is_plannable'=>0,
              'is_attendable'=>0,
            ],
        );
    }
}
