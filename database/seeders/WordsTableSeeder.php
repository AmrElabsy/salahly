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
            ),
            1 => 
            array (
                'id' => 92,
                'word' => 'login',
                'ar' => 'تسجيل الدخول',
                'en' => 'Login',
                'created_at' => '2023-05-01 11:28:04',
                'updated_at' => '2023-05-01 11:28:04',
            ),
            2 => 
            array (
                'id' => 93,
                'word' => 'logout',
                'ar' => 'تسجيل الخروج',
                'en' => 'Logout',
                'created_at' => '2023-05-01 11:28:04',
                'updated_at' => '2023-05-01 11:28:04',
            ),
            3 => 
            array (
                'id' => 94,
                'word' => 'home',
                'ar' => 'الصفحة الرئيسية',
                'en' => 'Home',
                'created_at' => '2023-05-01 11:28:04',
                'updated_at' => '2023-05-01 11:28:04',
            ),
            4 => 
            array (
                'id' => 95,
                'word' => 'attendance',
                'ar' => 'الغياب',
                'en' => 'Attendance',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            5 => 
            array (
                'id' => 96,
                'word' => 'status',
                'ar' => 'الحالة',
                'en' => 'Status',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            6 => 
            array (
                'id' => 97,
                'word' => 'statuses',
                'ar' => 'الحالات',
                'en' => 'Statuses',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            7 => 
            array (
                'id' => 98,
                'word' => 'add_status',
                'ar' => 'إضافة حالة جديدة',
                'en' => 'Add Status',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            8 => 
            array (
                'id' => 99,
                'word' => 'edit_status',
                'ar' => 'تعديل حالة',
                'en' => 'Edit Status',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            9 => 
            array (
                'id' => 100,
                'word' => 'status_added',
                'ar' => 'تم إضافة الحالة بنجاح',
                'en' => 'Status added Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            10 => 
            array (
                'id' => 101,
                'word' => 'status_updated',
                'ar' => 'تم تعديل الحالة بنجاح',
                'en' => 'Status updated Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            11 => 
            array (
                'id' => 102,
                'word' => 'status_deleted',
                'ar' => 'تم حذف الحالة بنجاح',
                'en' => 'Status deleted Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            12 => 
            array (
                'id' => 103,
                'word' => 'customer',
                'ar' => 'العميل',
                'en' => 'Customer',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            13 => 
            array (
                'id' => 104,
                'word' => 'customers',
                'ar' => 'العملاء',
                'en' => 'Customers',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            14 => 
            array (
                'id' => 105,
                'word' => 'add_customer',
                'ar' => 'إضافة عميل جديدة',
                'en' => 'Add Customer',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            15 => 
            array (
                'id' => 106,
                'word' => 'edit_customer',
                'ar' => 'تعديل عميل',
                'en' => 'Edit Customer',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            16 => 
            array (
                'id' => 107,
                'word' => 'customer_added',
                'ar' => 'تم إضافة العميل بنجاح',
                'en' => 'Customer added Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            17 => 
            array (
                'id' => 108,
                'word' => 'customer_updated',
                'ar' => 'تم تعديل العميل بنجاح',
                'en' => 'Customer updated Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            18 => 
            array (
                'id' => 109,
                'word' => 'customer_deleted',
                'ar' => 'تم حذف العميل بنجاح',
                'en' => 'Customer deleted Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            19 => 
            array (
                'id' => 110,
                'word' => 'customer_restored',
                'ar' => 'تم استعادة العميل بنجاح',
                'en' => 'Customer Restored Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            20 => 
            array (
                'id' => 111,
                'word' => 'deleted_customers',
                'ar' => 'العملاء المحذوفون',
                'en' => 'Deleted Customers',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            21 => 
            array (
                'id' => 112,
                'word' => 'is_new_customer',
                'ar' => 'هل أنت عميل جديد؟',
                'en' => 'Is New Customer',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            22 => 
            array (
                'id' => 113,
                'word' => 'phones',
                'ar' => 'الهواتف',
                'en' => 'Phones',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            23 => 
            array (
                'id' => 114,
                'word' => 'device',
                'ar' => 'الجهاز',
                'en' => 'Device',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            24 => 
            array (
                'id' => 115,
                'word' => 'devices',
                'ar' => 'الأجهزة',
                'en' => 'Devices',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            25 => 
            array (
                'id' => 116,
                'word' => 'add_device',
                'ar' => 'إضافة الجهاز',
                'en' => 'Add Device',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            26 => 
            array (
                'id' => 117,
                'word' => 'edit_device',
                'ar' => 'تعديل الجهاز',
                'en' => 'Edit Device',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            27 => 
            array (
                'id' => 118,
                'word' => 'device_added',
                'ar' => 'تم إضافة الجهاز بنجاح',
                'en' => 'Device added Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            28 => 
            array (
                'id' => 119,
                'word' => 'device_updated',
                'ar' => 'تم تعديل الجهاز بنجاح',
                'en' => 'Device updated Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            29 => 
            array (
                'id' => 120,
                'word' => 'device_deleted',
                'ar' => 'تم حذف الجهاز بنجاح',
                'en' => 'Device deleted Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            30 => 
            array (
                'id' => 121,
                'word' => 'device_restored',
                'ar' => 'تم إستعادة الجهاز بنجاح',
                'en' => 'Device Restored Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            31 => 
            array (
                'id' => 122,
                'word' => 'deleted_devices',
                'ar' => 'الأجهزة المحذوفة',
                'en' => 'Deleted Devices',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            32 => 
            array (
                'id' => 123,
                'word' => 'is_new_device',
                'ar' => 'هل هذا جهاز جديد؟',
                'en' => 'Is_New_Device',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            33 => 
            array (
                'id' => 124,
                'word' => 'problem',
                'ar' => 'المشكلة',
                'en' => 'Problem',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            34 => 
            array (
                'id' => 125,
                'word' => 'problems',
                'ar' => 'المشاكل',
                'en' => 'Problems',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            35 => 
            array (
                'id' => 126,
                'word' => 'add_problem',
                'ar' => 'إضافة مشكلة جديدة',
                'en' => 'Add Problem',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            36 => 
            array (
                'id' => 127,
                'word' => 'edit_problem',
                'ar' => 'تعديل مشكلة',
                'en' => 'Edit Problem',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            37 => 
            array (
                'id' => 128,
                'word' => 'problem_added',
                'ar' => 'تم إضافة المشكلة بنجاح',
                'en' => 'Problem added Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            38 => 
            array (
                'id' => 129,
                'word' => 'problem_updated',
                'ar' => 'تم تعديل المشكلة بنجاح',
                'en' => 'Problem updated Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            39 => 
            array (
                'id' => 130,
                'word' => 'problem_deleted',
                'ar' => 'تم حذف المشكلة بنجاح',
                'en' => 'Problem deleted Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            40 => 
            array (
                'id' => 131,
                'word' => 'problem_restored',
                'ar' => 'تم استعادة المشكلة بنجاح',
                'en' => 'Problem Restored Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            41 => 
            array (
                'id' => 132,
                'word' => 'deleted_problems',
                'ar' => 'المشاكل المحذوفة',
                'en' => 'Deleted Problems',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            42 => 
            array (
                'id' => 133,
                'word' => 'description',
                'ar' => 'الوصف',
                'en' => 'Description',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            43 => 
            array (
                'id' => 134,
                'word' => 'price',
                'ar' => 'السعر',
                'en' => 'Price',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            44 => 
            array (
                'id' => 135,
                'word' => 'paid',
                'ar' => 'المدفوع',
                'en' => 'Paid',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            45 => 
            array (
                'id' => 136,
                'word' => 'due_time',
                'ar' => 'ميعاد التسليم',
                'en' => 'Due Time',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            46 => 
            array (
                'id' => 137,
                'word' => 'comment',
                'ar' => 'التعليق',
                'en' => 'Comment',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            47 => 
            array (
                'id' => 138,
                'word' => 'employee',
                'ar' => 'الموظف',
                'en' => 'Employee',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            48 => 
            array (
                'id' => 139,
                'word' => 'employees',
                'ar' => 'الموظفون',
                'en' => 'Employees',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            49 => 
            array (
                'id' => 140,
                'word' => 'add_employee',
                'ar' => 'إضافة موظف جديد',
                'en' => 'Add Employee',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            50 => 
            array (
                'id' => 141,
                'word' => 'edit_employee',
                'ar' => 'تعديل الموظف',
                'en' => 'Edit Employee',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            51 => 
            array (
                'id' => 142,
                'word' => 'employee_added',
                'ar' => 'تم إضافة الموظف بنجاح',
                'en' => 'Employee added Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            52 => 
            array (
                'id' => 143,
                'word' => 'employee_updated',
                'ar' => 'تم تعديل الموظف بنجاح',
                'en' => 'Employee updated Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            53 => 
            array (
                'id' => 144,
                'word' => 'employee_deleted',
                'ar' => 'تم حذف الموظف بنجاح',
                'en' => 'Employee deleted Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            54 => 
            array (
                'id' => 145,
                'word' => 'employee_restored',
                'ar' => 'تم استعادة الموظف بنجاح',
                'en' => 'Employee Restored Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            55 => 
            array (
                'id' => 146,
                'word' => 'deleted_employees',
                'ar' => 'الموظفون المحذوفون',
                'en' => 'Deleted Employees',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            56 => 
            array (
                'id' => 147,
                'word' => 'branch',
                'ar' => 'الفرع',
                'en' => 'Branch',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            57 => 
            array (
                'id' => 148,
                'word' => 'branches',
                'ar' => 'الفروع',
                'en' => 'Branches',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            58 => 
            array (
                'id' => 149,
                'word' => 'add_branch',
                'ar' => 'إضافة فرع جديد',
                'en' => 'Add Branch',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            59 => 
            array (
                'id' => 150,
                'word' => 'edit_branch',
                'ar' => 'تعديل فرع',
                'en' => 'Edit Branch',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            60 => 
            array (
                'id' => 151,
                'word' => 'branch_added',
                'ar' => 'تم إضافة الفرع بنجاح',
                'en' => 'Branch added Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            61 => 
            array (
                'id' => 152,
                'word' => 'branch_updated',
                'ar' => 'تم تعديل الفرع بنجاح',
                'en' => 'Branch updated Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            62 => 
            array (
                'id' => 153,
                'word' => 'branch_deleted',
                'ar' => 'تم حذف الفرع بنجاح',
                'en' => 'Branch deleted Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            63 => 
            array (
                'id' => 154,
                'word' => 'material',
                'ar' => 'الخامة',
                'en' => 'Material',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            64 => 
            array (
                'id' => 155,
                'word' => 'materials',
                'ar' => 'الخامات',
                'en' => 'Materials',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            65 => 
            array (
                'id' => 156,
                'word' => 'add_material',
                'ar' => 'إضافة خامة جديد',
                'en' => 'Add material',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            66 => 
            array (
                'id' => 157,
                'word' => 'edit_material',
                'ar' => 'تعديل خامة',
                'en' => 'Edit material',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            67 => 
            array (
                'id' => 158,
                'word' => 'material_added',
                'ar' => 'تم إضافة الخامة بنجاح',
                'en' => 'Material added Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            68 => 
            array (
                'id' => 159,
                'word' => 'material_updated',
                'ar' => 'تم تعديل الخامة بنجاح',
                'en' => 'Material updated Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            69 => 
            array (
                'id' => 160,
                'word' => 'material_deleted',
                'ar' => 'تم حذف الخامة بنجاح',
                'en' => 'Material deleted Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            70 => 
            array (
                'id' => 161,
                'word' => 'deleted_materials',
                'ar' => 'الخامات المحذوفة',
                'en' => 'Deleted Materials',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            71 => 
            array (
                'id' => 162,
                'word' => 'material_restored',
                'ar' => 'تم إستعادة الخامة بنجاح',
                'en' => 'Material restored Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            72 => 
            array (
                'id' => 163,
                'word' => 'name',
                'ar' => 'الإسم',
                'en' => 'Name',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            73 => 
            array (
                'id' => 164,
                'word' => 'cost',
                'ar' => 'التكلفة',
                'en' => 'Cost',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            74 => 
            array (
                'id' => 165,
                'word' => 'supply',
                'ar' => 'لازمة',
                'en' => 'Supply',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            75 => 
            array (
                'id' => 166,
                'word' => 'supplies',
                'ar' => 'لوازم',
                'en' => 'Supplies',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            76 => 
            array (
                'id' => 167,
                'word' => 'add_supply',
                'ar' => 'إضافة لازمة',
                'en' => 'Add supply',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            77 => 
            array (
                'id' => 168,
                'word' => 'edit_supply',
                'ar' => 'تعديل لازمة',
                'en' => 'Edit supply',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            78 => 
            array (
                'id' => 169,
                'word' => 'supply_added',
                'ar' => 'تم إضافة اللازمة بنجاح',
                'en' => 'Supply added Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            79 => 
            array (
                'id' => 170,
                'word' => 'supply_updated',
                'ar' => 'تم تعديل اللازمة بنجاح',
                'en' => 'Supply updated Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            80 => 
            array (
                'id' => 171,
                'word' => 'supply_deleted',
                'ar' => 'تم حذف اللازمة بنجاح',
                'en' => 'Supply deleted Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            81 => 
            array (
                'id' => 172,
                'word' => 'deleted_supplies',
                'ar' => 'اللوازم المحذوفة',
                'en' => 'Deleted Supplies',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            82 => 
            array (
                'id' => 173,
                'word' => 'supply_restored',
                'ar' => 'تم إستعادة اللازمة بنجاح',
                'en' => 'Supply restored Successfully',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            83 => 
            array (
                'id' => 174,
                'word' => 'add',
                'ar' => 'إضافة',
                'en' => 'Add',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            84 => 
            array (
                'id' => 175,
                'word' => 'edit',
                'ar' => 'تعديل',
                'en' => 'Edit',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            85 => 
            array (
                'id' => 176,
                'word' => 'delete',
                'ar' => 'حذف',
                'en' => 'Delete',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            86 => 
            array (
                'id' => 177,
                'word' => 'submit',
                'ar' => 'تسجيل',
                'en' => 'Submit',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            87 => 
            array (
                'id' => 178,
                'word' => 'restore',
                'ar' => 'استعادة',
                'en' => 'Restore',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            88 => 
            array (
                'id' => 179,
                'word' => 'force_delete',
                'ar' => 'حذف تام',
                'en' => 'Force Delete',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
            89 => 
            array (
                'id' => 180,
                'word' => 'manage',
                'ar' => 'تحكم',
                'en' => 'Manage',
                'created_at' => '2023-05-01 11:28:05',
                'updated_at' => '2023-05-01 11:28:05',
            ),
        ));
        
        
    }
}