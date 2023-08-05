<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WordsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('words')->delete();

        \DB::table('words')->insert(array (
            0 =>
            array (
                'id' => 91,
                'word' => 'users',
                'ar' => 'المستخدمين',
                'en' => 'Users',
                'created_at' => '2023-05-01 11:28:04',
                'updated_at' => '2023-05-01 11:28:04',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 92,
                'word' => 'login',
                'ar' => 'تسجيل الدخول',
                'en' => 'Login',
                'created_at' => '2023-05-01 11:28:04',
                'updated_at' => '2023-05-01 11:28:04',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 93,
                'word' => 'logout',
                'ar' => 'تسجيل الخروج',
                'en' => 'Logout',
                'created_at' => '2023-05-01 11:28:04',
                'updated_at' => '2023-05-01 11:28:04',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => 94,
                'word' => 'home',
                'ar' => 'الصفحة الرئيسية',
                'en' => 'Home',
                'created_at' => '2023-05-01 11:28:04',
                'updated_at' => '2023-05-01 11:28:04',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'id' => 95,
                'word' => 'attendance',
                'ar' => 'الغياب',
                'en' => 'Attendance',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'id' => 96,
                'word' => 'status',
                'ar' => 'الحالة',
                'en' => 'Status',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'id' => 97,
                'word' => 'statuses',
                'ar' => 'الحالات',
                'en' => 'Statuses',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'id' => 98,
                'word' => 'add_status',
                'ar' => 'إضافة حالة جديدة',
                'en' => 'Add Status',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            8 =>
            array (
                'id' => 99,
                'word' => 'edit_status',
                'ar' => 'تعديل حالة',
                'en' => 'Edit Status',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            9 =>
            array (
                'id' => 100,
                'word' => 'status_added',
                'ar' => 'تم إضافة الحالة بنجاح',
                'en' => 'Status added Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            10 =>
            array (
                'id' => 101,
                'word' => 'status_updated',
                'ar' => 'تم تعديل الحالة بنجاح',
                'en' => 'Status updated Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            11 =>
            array (
                'id' => 102,
                'word' => 'status_deleted',
                'ar' => 'تم حذف الحالة بنجاح',
                'en' => 'Status deleted Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            12 =>
            array (
                'id' => 103,
                'word' => 'customer',
                'ar' => 'العميل',
                'en' => 'Customer',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            13 =>
            array (
                'id' => 104,
                'word' => 'customers',
                'ar' => 'العملاء',
                'en' => 'Customers',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-06-22 13:01:27',
                'deleted_at' => NULL,
            ),
            14 =>
            array (
                'id' => 105,
                'word' => 'add_customer',
                'ar' => 'إضافة عميل جديدة',
                'en' => 'Add Customer',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            15 =>
            array (
                'id' => 106,
                'word' => 'edit_customer',
                'ar' => 'تعديل عميل',
                'en' => 'Edit Customer',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            16 =>
            array (
                'id' => 107,
                'word' => 'customer_added',
                'ar' => 'تم إضافة العميل بنجاح',
                'en' => 'Customer added Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            17 =>
            array (
                'id' => 108,
                'word' => 'customer_updated',
                'ar' => 'تم تعديل العميل بنجاح',
                'en' => 'Customer updated Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            18 =>
            array (
                'id' => 109,
                'word' => 'customer_deleted',
                'ar' => 'تم حذف العميل بنجاح',
                'en' => 'Customer deleted Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            19 =>
            array (
                'id' => 110,
                'word' => 'customer_restored',
                'ar' => 'تم استعادة العميل بنجاح',
                'en' => 'Customer Restored Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            20 =>
            array (
                'id' => 111,
                'word' => 'deleted_customers',
                'ar' => 'العملاء المحذوفون',
                'en' => 'Deleted Customers',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            21 =>
            array (
                'id' => 112,
                'word' => 'is_new_customer',
                'ar' => 'هل أنت عميل جديد؟',
                'en' => 'Is New Customer',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            22 =>
            array (
                'id' => 113,
                'word' => 'phones',
                'ar' => 'الهواتف',
                'en' => 'Phones',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            23 =>
            array (
                'id' => 114,
                'word' => 'device',
                'ar' => 'الجهاز',
                'en' => 'Device',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            24 =>
            array (
                'id' => 115,
                'word' => 'devices',
                'ar' => 'الأجهزة',
                'en' => 'Devices',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            25 =>
            array (
                'id' => 116,
                'word' => 'add_device',
                'ar' => 'إضافة الجهاز',
                'en' => 'Add Device',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            26 =>
            array (
                'id' => 117,
                'word' => 'edit_device',
                'ar' => 'تعديل الجهاز',
                'en' => 'Edit Device',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            27 =>
            array (
                'id' => 118,
                'word' => 'device_added',
                'ar' => 'تم إضافة الجهاز بنجاح',
                'en' => 'Device added Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            28 =>
            array (
                'id' => 119,
                'word' => 'device_updated',
                'ar' => 'تم تعديل الجهاز بنجاح',
                'en' => 'Device updated Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            29 =>
            array (
                'id' => 120,
                'word' => 'device_deleted',
                'ar' => 'تم حذف الجهاز بنجاح',
                'en' => 'Device deleted Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            30 =>
            array (
                'id' => 121,
                'word' => 'device_restored',
                'ar' => 'تم إستعادة الجهاز بنجاح',
                'en' => 'Device Restored Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            31 =>
            array (
                'id' => 122,
                'word' => 'deleted_devices',
                'ar' => 'الأجهزة المحذوفة',
                'en' => 'Deleted Devices',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            32 =>
            array (
                'id' => 123,
                'word' => 'is_new_device',
                'ar' => 'هل هذا جهاز جديد؟',
                'en' => 'Is_New_Device',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            33 =>
            array (
                'id' => 124,
                'word' => 'problem',
                'ar' => 'المشكلة',
                'en' => 'Problem',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            34 =>
            array (
                'id' => 125,
                'word' => 'problems',
                'ar' => 'المشاكل',
                'en' => 'Problems',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            35 =>
            array (
                'id' => 126,
                'word' => 'add_problem',
                'ar' => 'إضافة مشكلة جديدة',
                'en' => 'Add Problem',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            36 =>
            array (
                'id' => 127,
                'word' => 'edit_problem',
                'ar' => 'تعديل مشكلة',
                'en' => 'Edit Problem',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            37 =>
            array (
                'id' => 128,
                'word' => 'problem_added',
                'ar' => 'تم إضافة المشكلة بنجاح',
                'en' => 'Problem added Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            38 =>
            array (
                'id' => 129,
                'word' => 'problem_updated',
                'ar' => 'تم تعديل المشكلة بنجاح',
                'en' => 'Problem updated Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            39 =>
            array (
                'id' => 130,
                'word' => 'problem_deleted',
                'ar' => 'تم حذف المشكلة بنجاح',
                'en' => 'Problem deleted Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            40 =>
            array (
                'id' => 131,
                'word' => 'problem_restored',
                'ar' => 'تم استعادة المشكلة بنجاح',
                'en' => 'Problem Restored Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            41 =>
            array (
                'id' => 132,
                'word' => 'deleted_problems',
                'ar' => 'المشاكل المحذوفة',
                'en' => 'Deleted Problems',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            42 =>
            array (
                'id' => 133,
                'word' => 'description',
                'ar' => 'الوصف',
                'en' => 'Description',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            43 =>
            array (
                'id' => 134,
                'word' => 'price',
                'ar' => 'السعر',
                'en' => 'Price',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            44 =>
            array (
                'id' => 135,
                'word' => 'paid',
                'ar' => 'المدفوع',
                'en' => 'Paid',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            45 =>
            array (
                'id' => 136,
                'word' => 'due_time',
                'ar' => 'ميعاد التسليم',
                'en' => 'Due Time',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            46 =>
            array (
                'id' => 137,
                'word' => 'comment',
                'ar' => 'التعليق',
                'en' => 'Comment',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            47 =>
            array (
                'id' => 138,
                'word' => 'employee',
                'ar' => 'الموظف',
                'en' => 'Employee',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            48 =>
            array (
                'id' => 139,
                'word' => 'employees',
                'ar' => 'الموظفون',
                'en' => 'Employees',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            49 =>
            array (
                'id' => 140,
                'word' => 'add_employee',
                'ar' => 'إضافة موظف جديد',
                'en' => 'Add Employee',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            50 =>
            array (
                'id' => 141,
                'word' => 'edit_employee',
                'ar' => 'تعديل الموظف',
                'en' => 'Edit Employee',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            51 =>
            array (
                'id' => 142,
                'word' => 'employee_added',
                'ar' => 'تم إضافة الموظف بنجاح',
                'en' => 'Employee added Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            52 =>
            array (
                'id' => 143,
                'word' => 'employee_updated',
                'ar' => 'تم تعديل الموظف بنجاح',
                'en' => 'Employee updated Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            53 =>
            array (
                'id' => 144,
                'word' => 'employee_deleted',
                'ar' => 'تم حذف الموظف بنجاح',
                'en' => 'Employee deleted Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            54 =>
            array (
                'id' => 145,
                'word' => 'employee_restored',
                'ar' => 'تم استعادة الموظف بنجاح',
                'en' => 'Employee Restored Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            55 =>
            array (
                'id' => 146,
                'word' => 'deleted_employees',
                'ar' => 'الموظفون المحذوفون',
                'en' => 'Deleted Employees',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            56 =>
            array (
                'id' => 147,
                'word' => 'branch',
                'ar' => 'الفرع',
                'en' => 'Branch',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            57 =>
            array (
                'id' => 148,
                'word' => 'branches',
                'ar' => 'الفروع',
                'en' => 'Branches',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            58 =>
            array (
                'id' => 149,
                'word' => 'add_branch',
                'ar' => 'إضافة فرع جديد',
                'en' => 'Add Branch',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            59 =>
            array (
                'id' => 150,
                'word' => 'edit_branch',
                'ar' => 'تعديل فرع',
                'en' => 'Edit Branch',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            60 =>
            array (
                'id' => 151,
                'word' => 'branch_added',
                'ar' => 'تم إضافة الفرع بنجاح',
                'en' => 'Branch added Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            61 =>
            array (
                'id' => 152,
                'word' => 'branch_updated',
                'ar' => 'تم تعديل الفرع بنجاح',
                'en' => 'Branch updated Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            62 =>
            array (
                'id' => 153,
                'word' => 'branch_deleted',
                'ar' => 'تم حذف الفرع بنجاح',
                'en' => 'Branch deleted Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            63 =>
            array (
                'id' => 154,
                'word' => 'material',
                'ar' => 'الخامة',
                'en' => 'Material',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            64 =>
            array (
                'id' => 155,
                'word' => 'materials',
                'ar' => 'الخامات',
                'en' => 'Materials',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            65 =>
            array (
                'id' => 156,
                'word' => 'add_material',
                'ar' => 'إضافة خامة جديد',
                'en' => 'Add material',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            66 =>
            array (
                'id' => 157,
                'word' => 'edit_material',
                'ar' => 'تعديل خامة',
                'en' => 'Edit material',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            67 =>
            array (
                'id' => 158,
                'word' => 'material_added',
                'ar' => 'تم إضافة الخامة بنجاح',
                'en' => 'Material added Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            68 =>
            array (
                'id' => 159,
                'word' => 'material_updated',
                'ar' => 'تم تعديل الخامة بنجاح',
                'en' => 'Material updated Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            69 =>
            array (
                'id' => 160,
                'word' => 'material_deleted',
                'ar' => 'تم حذف الخامة بنجاح',
                'en' => 'Material deleted Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            70 =>
            array (
                'id' => 161,
                'word' => 'deleted_materials',
                'ar' => 'الخامات المحذوفة',
                'en' => 'Deleted Materials',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            71 =>
            array (
                'id' => 162,
                'word' => 'material_restored',
                'ar' => 'تم إستعادة الخامة بنجاح',
                'en' => 'Material restored Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            72 =>
            array (
                'id' => 163,
                'word' => 'name',
                'ar' => 'الإسم',
                'en' => 'Name',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            73 =>
            array (
                'id' => 164,
                'word' => 'cost',
                'ar' => 'التكلفة',
                'en' => 'Cost',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            74 =>
            array (
                'id' => 165,
                'word' => 'supply',
                'ar' => 'لازمة',
                'en' => 'Supply',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            75 =>
            array (
                'id' => 166,
                'word' => 'supplies',
                'ar' => 'لوازم',
                'en' => 'Supplies',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            76 =>
            array (
                'id' => 167,
                'word' => 'add_supply',
                'ar' => 'إضافة لازمة',
                'en' => 'Add supply',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            77 =>
            array (
                'id' => 168,
                'word' => 'edit_supply',
                'ar' => 'تعديل لازمة',
                'en' => 'Edit supply',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            78 =>
            array (
                'id' => 169,
                'word' => 'supply_added',
                'ar' => 'تم إضافة اللازمة بنجاح',
                'en' => 'Supply added Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            79 =>
            array (
                'id' => 170,
                'word' => 'supply_updated',
                'ar' => 'تم تعديل اللازمة بنجاح',
                'en' => 'Supply updated Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            80 =>
            array (
                'id' => 171,
                'word' => 'supply_deleted',
                'ar' => 'تم حذف اللازمة بنجاح',
                'en' => 'Supply deleted Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            81 =>
            array (
                'id' => 172,
                'word' => 'deleted_supplies',
                'ar' => 'اللوازم المحذوفة',
                'en' => 'Deleted Supplies',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            82 =>
            array (
                'id' => 173,
                'word' => 'supply_restored',
                'ar' => 'تم إستعادة اللازمة بنجاح',
                'en' => 'Supply restored Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            83 =>
            array (
                'id' => 174,
                'word' => 'add',
                'ar' => 'إضافة',
                'en' => 'Add',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            84 =>
            array (
                'id' => 175,
                'word' => 'edit',
                'ar' => 'تعديل',
                'en' => 'Edit',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            85 =>
            array (
                'id' => 176,
                'word' => 'delete',
                'ar' => 'حذف',
                'en' => 'Delete',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            86 =>
            array (
                'id' => 177,
                'word' => 'submit',
                'ar' => 'تسجيل',
                'en' => 'Submit',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            87 =>
            array (
                'id' => 178,
                'word' => 'restore',
                'ar' => 'استعادة',
                'en' => 'Restore',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            88 =>
            array (
                'id' => 179,
                'word' => 'force_delete',
                'ar' => 'حذف تام',
                'en' => 'Force Delete',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            89 =>
            array (
                'id' => 180,
                'word' => 'manage',
                'ar' => 'تحكم',
                'en' => 'Manage',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
                'deleted_at' => NULL,
            ),
            90 =>
            array (
                'id' => 181,
                'word' => 'word',
                'ar' => 'الكلمة',
                'en' => 'Word',
                'created_at' => '2023-05-05 19:12:58',
                'updated_at' => '2023-05-05 19:12:58',
                'deleted_at' => NULL,
            ),
            91 =>
            array (
                'id' => 182,
                'word' => 'word_added',
                'ar' => 'تم إضافة الكلمة بنجاح',
                'en' => 'Word Added Successfully',
                'created_at' => '2023-05-05 19:13:16',
                'updated_at' => '2023-05-05 19:13:16',
                'deleted_at' => NULL,
            ),
            92 =>
            array (
                'id' => 183,
                'word' => 'words',
                'ar' => 'الكلمات',
                'en' => 'Words',
                'created_at' => '2023-05-05 19:13:30',
                'updated_at' => '2023-05-05 19:13:30',
                'deleted_at' => NULL,
            ),
            93 =>
            array (
                'id' => 184,
                'word' => 'roles',
                'ar' => 'الأدوار',
                'en' => 'Roles',
                'created_at' => '2023-05-05 19:15:55',
                'updated_at' => '2023-05-05 19:15:55',
                'deleted_at' => NULL,
            ),
            94 =>
            array (
                'id' => 185,
                'word' => 'permissions',
                'ar' => 'الصلاحيات',
                'en' => 'Permissions',
                'created_at' => '2023-05-05 23:57:07',
                'updated_at' => '2023-05-05 23:57:25',
                'deleted_at' => NULL,
            ),
            95 =>
            array (
                'id' => 186,
                'word' => 'word_updated',
                'ar' => 'تم تحديث الكلمة بنجاح',
                'en' => 'Word Updated Successfully',
                'created_at' => '2023-05-06 00:04:43',
                'updated_at' => '2023-05-06 00:04:43',
                'deleted_at' => NULL,
            ),
            96 =>
            array (
                'id' => 187,
                'word' => 'email',
                'ar' => 'البريد الإلكتروني',
                'en' => 'Email',
                'created_at' => '2023-05-06 00:11:48',
                'updated_at' => '2023-05-06 00:11:48',
                'deleted_at' => NULL,
            ),
            97 =>
            array (
                'id' => 188,
                'word' => 'type',
                'ar' => 'النوع',
                'en' => 'Type',
                'created_at' => '2023-05-06 00:12:13',
                'updated_at' => '2023-05-06 00:12:13',
                'deleted_at' => NULL,
            ),
            98 =>
            array (
                'id' => 189,
                'word' => 'total_profit',
                'ar' => 'إجمالي الربح',
                'en' => 'Total Profit',
                'created_at' => '2023-06-21 16:49:53',
                'updated_at' => '2023-06-21 16:49:53',
                'deleted_at' => NULL,
            ),
            99 =>
            array (
                'id' => 190,
                'word' => 'net_profit',
                'ar' => 'صافي الربح',
                'en' => 'Net Profit',
                'created_at' => '2023-06-21 16:50:11',
                'updated_at' => '2023-06-21 16:50:11',
                'deleted_at' => NULL,
            ),
            100 =>
            array (
                'id' => 191,
                'word' => 'categories',
                'ar' => 'الفئات',
                'en' => 'Categories',
                'created_at' => '2023-06-21 16:50:45',
                'updated_at' => '2023-06-21 16:50:45',
                'deleted_at' => NULL,
            ),
            101 =>
            array (
                'id' => 192,
                'word' => 'services',
                'ar' => 'الخدمات',
                'en' => 'Services',
                'created_at' => '2023-06-21 16:51:00',
                'updated_at' => '2023-06-21 16:51:00',
                'deleted_at' => NULL,
            ),
            102 =>
            array (
                'id' => 193,
                'word' => 'feedback',
                'ar' => 'رأي',
                'en' => 'Feedback',
                'created_at' => '2023-06-21 16:51:19',
                'updated_at' => '2023-06-21 16:51:19',
                'deleted_at' => NULL,
            ),
            103 =>
            array (
                'id' => 194,
                'word' => 'user_added',
                'ar' => 'تم إضافة المستخدم بنجاح',
                'en' => 'User Added Successfully',
                'created_at' => '2023-06-21 16:56:17',
                'updated_at' => '2023-06-21 16:56:17',
                'deleted_at' => NULL,
            ),
            104 =>
            array (
                'id' => 195,
                'word' => 'role_updated',
                'ar' => 'تم تعديل الدور بنجاح',
                'en' => 'Role Updated Successfully',
                'created_at' => '2023-06-21 17:59:20',
                'updated_at' => '2023-06-21 17:59:20',
                'deleted_at' => NULL,
            ),
            105 =>
            array (
                'id' => 196,
                'word' => 'le',
                'ar' => 'جنيه',
                'en' => 'L.E',
                'created_at' => '2023-06-26 23:26:55',
                'updated_at' => '2023-06-26 23:26:55',
                'deleted_at' => NULL,
            ),
            106 =>
            array (
                'id' => 197,
                'word' => 'piece',
                'ar' => 'قطعة',
                'en' => 'Piece',
                'created_at' => '2023-06-26 23:30:17',
                'updated_at' => '2023-06-26 23:30:17',
                'deleted_at' => NULL,
            ),
            107 =>
            array (
                'id' => 198,
                'word' => 'supply_returns',
                'ar' => 'مرتجعات اللوازم',
                'en' => 'Supplies Returns',
                'created_at' => '2023-06-26 23:41:49',
                'updated_at' => '2023-06-26 23:41:49',
                'deleted_at' => NULL,
            ),
            108 =>
            array (
                'id' => 199,
                'word' => 'material_returns',
                'ar' => 'مرتجعات الخامات',
                'en' => 'Materials Returns',
                'created_at' => '2023-06-26 23:42:49',
                'updated_at' => '2023-06-26 23:42:49',
                'deleted_at' => NULL,
            ),
            109 =>
            array (
                'id' => 200,
                'word' => 'material_wastes',
                'ar' => 'الهوالك',
                'en' => 'Wastes',
                'created_at' => '2023-06-26 23:43:05',
                'updated_at' => '2023-06-26 23:43:05',
                'deleted_at' => NULL,
            ),
            110 =>
            array (
                'id' => 201,
                'word' => 'manage_money',
                'ar' => 'الخزنة',
                'en' => 'Treasury',
                'created_at' => '2023-08-02 21:01:24',
                'updated_at' => '2023-08-02 21:01:24',
                'deleted_at' => NULL,
            ),
            111 =>
            array (
                'id' => 202,
                'word' => 'stock_management',
                'ar' => 'إدارة المخازن',
                'en' => 'Stock Management',
                'created_at' => '2023-08-02 21:02:31',
                'updated_at' => '2023-08-02 21:02:31',
                'deleted_at' => NULL,
            ),
            112 =>
            array (
                'id' => 203,
                'word' => 'amount',
                'ar' => 'الكمية',
                'en' => 'Amount',
                'created_at' => '2023-08-02 21:02:52',
                'updated_at' => '2023-08-02 21:02:52',
                'deleted_at' => NULL,
            ),
            113 =>
            array (
                'id' => 204,
                'word' => 'minutes_late',
                'ar' => 'دقائق التأخير',
                'en' => 'Minutes Late',
                'created_at' => '2023-08-05 03:24:22',
                'updated_at' => '2023-08-05 03:24:22',
                'deleted_at' => NULL,
            ),
            114 =>
            array (
                'id' => 205,
                'word' => 'day',
                'ar' => 'اليوم',
                'en' => 'Day',
                'created_at' => '2023-08-05 03:24:44',
                'updated_at' => '2023-08-05 03:24:44',
                'deleted_at' => NULL,
            ),
            115 =>
            array (
                'id' => 206,
                'word' => 'entrance',
                'ar' => 'الحضور',
                'en' => 'Entrance',
                'created_at' => '2023-08-05 03:25:03',
                'updated_at' => '2023-08-05 03:25:03',
                'deleted_at' => NULL,
            ),
            116 =>
            array (
                'id' => 207,
                'word' => 'leaving',
                'ar' => 'الانصراف',
                'en' => 'Leaving',
                'created_at' => '2023-08-05 03:25:19',
                'updated_at' => '2023-08-05 03:25:19',
                'deleted_at' => NULL,
            ),
            117 =>
            array (
                'id' => 208,
                'word' => 'absent',
                'ar' => 'غياب',
                'en' => 'Absent',
                'created_at' => '2023-08-05 03:44:00',
                'updated_at' => '2023-08-05 03:44:00',
                'deleted_at' => NULL,
            ),
            118 =>
            array (
                'id' => 209,
                'word' => 'didnt_leave',
                'ar' => 'لم يتم تسجيل المغادرة',
                'en' => 'Didn\'t Leave',
                'created_at' => '2023-08-05 03:44:30',
                'updated_at' => '2023-08-05 03:44:30',
                'deleted_at' => NULL,
            ),
            119 =>
            array (
                'id' => 210,
                'word' => 'holiday',
                'ar' => 'إجازة',
                'en' => 'Holiday',
                'created_at' => '2023-08-05 03:44:45',
                'updated_at' => '2023-08-05 03:44:45',
                'deleted_at' => NULL,
            ),
            120 =>
            array (
                'id' => 211,
                'word' => 'attendances',
                'ar' => 'الحضور والغياب',
                'en' => 'Attendacnes',
                'created_at' => '2023-08-05 03:45:34',
                'updated_at' => '2023-08-05 03:45:34',
                'deleted_at' => NULL,
            ),
            121 =>
            array (
                'id' => 212,
                'word' => 'english',
                'ar' => 'الإنجليزية',
                'en' => 'English',
                'created_at' => '2023-08-05 03:45:47',
                'updated_at' => '2023-08-05 03:45:47',
                'deleted_at' => NULL,
            ),
            122 =>
            array (
                'id' => 213,
                'word' => 'arabic',
                'ar' => 'العربية',
                'en' => 'Arabic',
                'created_at' => '2023-08-05 03:46:02',
                'updated_at' => '2023-08-05 03:46:02',
                'deleted_at' => NULL,
            ),
            123 =>
            array (
                'id' => 214,
                'word' => 'holidays',
                'ar' => 'الإجازات',
                'en' => 'Holidays',
                'created_at' => '2023-08-05 03:47:05',
                'updated_at' => '2023-08-05 03:47:05',
                'deleted_at' => NULL,
            ),
            124 =>
            array (
                'id' => 215,
                'word' => 'weekends',
                'ar' => 'إجازات نهاية الأسبوع',
                'en' => 'Weekends',
                'created_at' => '2023-08-05 03:47:19',
                'updated_at' => '2023-08-05 03:47:19',
                'deleted_at' => NULL,
            ),
            125 =>
            array (
                'id' => 216,
                'word' => 'feedbacks',
                'ar' => 'الأراء',
                'en' => 'Feedbacks',
                'created_at' => '2023-08-05 03:47:35',
                'updated_at' => '2023-08-05 03:47:35',
                'deleted_at' => NULL,
            ),
            126 =>
            array (
                'id' => 217,
                'word' => 'salary',
                'ar' => 'المرتب',
                'en' => 'Salary',
                'created_at' => '2023-08-05 03:50:15',
                'updated_at' => '2023-08-05 03:50:15',
                'deleted_at' => NULL,
            ),
            127 =>
            array (
                'id' => 218,
                'word' => 'percentage',
                'ar' => 'النسبة',
                'en' => 'Percentage',
                'created_at' => '2023-08-05 03:50:26',
                'updated_at' => '2023-08-05 03:50:26',
                'deleted_at' => NULL,
            ),
            128 =>
            array (
                'id' => 219,
                'word' => 'attend',
                'ar' => 'حضور',
                'en' => 'Attend',
                'created_at' => '2023-08-05 04:11:10',
                'updated_at' => '2023-08-05 04:11:10',
                'deleted_at' => NULL,
            ),
            129 =>
            array (
                'id' => 220,
                'word' => 'leave',
                'ar' => 'مغادرة',
                'en' => 'Leave',
                'created_at' => '2023-08-05 04:11:43',
                'updated_at' => '2023-08-05 04:11:43',
                'deleted_at' => NULL,
            ),
            130 =>
            array (
                'id' => 221,
                'word' => 'phone',
                'ar' => 'رقم الهاتف',
                'en' => 'Phone Number',
                'created_at' => '2023-08-05 04:14:30',
                'updated_at' => '2023-08-05 04:14:30',
                'deleted_at' => NULL,
            ),
            131 =>
            array (
                'id' => 222,
                'word' => 'category',
                'ar' => 'الفئة',
                'en' => 'Category',
                'created_at' => '2023-08-05 04:18:32',
                'updated_at' => '2023-08-05 04:18:32',
                'deleted_at' => NULL,
            ),
            132 =>
            array (
                'id' => 223,
                'word' => 'month',
                'ar' => 'الشهر',
                'en' => 'Month',
                'created_at' => '2023-08-05 04:21:32',
                'updated_at' => '2023-08-05 04:21:32',
                'deleted_at' => NULL,
            ),
            132 =>
                array (
                    'id' => 226,
                    'word' => 'known_from',
                    'ar' => 'عرفتنا منين',
                    'en' => 'Known From',
                    'created_at' => '2023-08-05 04:21:32',
                    'updated_at' => '2023-08-05 04:21:32',
                    'deleted_at' => NULL,
                ),
            132 =>
                array (
                    'id' => 225,
                    'word' => 'where_from',
                    'ar' => 'انت منين',
                    'en' => 'Where From',
                    'created_at' => '2023-08-05 04:21:32',
                    'updated_at' => '2023-08-05 04:21:32',
                    'deleted_at' => NULL,
                ),
        ));


    }
}
