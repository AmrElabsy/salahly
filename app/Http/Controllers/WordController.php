<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Http\Requests\StoreWordRequest;
use App\Http\Requests\UpdateWordRequest;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function index(Request $request)
    {
        $words = Word::query();
        
        if ($request->has('word')) {
            $searchTerm = $request->input('word');
            $words->where('word', 'like', '%'.$searchTerm.'%')
                ->orWhere('en', 'like', '%'.$searchTerm.'%')
                ->orWhere('ar', 'like', '%'.$searchTerm.'%');
        }
        
        $words = $words->paginate(10);
        return view('words.index', compact('words'));
    }
    
    public function create()
    {
        return view('words.create');
    }
    
    public function store(StoreWordRequest $request)
    {
        $word = new Word();
        $word->word = $request->input('word');
        $word->ar = $request->input('ar');
        $word->en = $request->input('en');
        $word->save();
        
        return redirect()->route('word.index')->withStatus(__('titles.word_added'));
    }
    
    public function edit(Word $word)
    {
        return view('words.edit', compact('word'));
    }
    
    public function update(UpdateWordRequest $request, Word $word)
    {
        $word->word = $request->input('word');
        $word->ar = $request->input('ar');
        $word->en = $request->input('en');
        $word->save();
        
        return redirect()->route('word.index')->withStatus(__('titles.word_updated'));
    }
    
    public function destroy(Word $word)
    {
        $word->delete();
        
        return redirect()->route('word.index')->withStatus(__('titles.word_deleted'));
    }
    
    public function add() {
        $ar = [
            "users" => "المستخدمين",
            "login" => "تسجيل الدخول",
            "logout" => "تسجيل الخروج",
            "home"=>"الصفحة الرئيسية",
            "attendance"=>"الغياب",
    
            //status
            "status" => "الحالة",
            "statuses" => "الحالات",
            "add_status" => "إضافة حالة جديدة",
            "edit_status" => "تعديل حالة",
            "status_added" => "تم إضافة الحالة بنجاح",
            "status_updated" => "تم تعديل الحالة بنجاح",
            "status_deleted" => "تم حذف الحالة بنجاح",
    
            //customer
            "customer" => "العميل",
            "customers" => "العملاء",
            "add_customer" => "إضافة عميل جديدة",
            "edit_customer" => "تعديل عميل",
            "customer_added" => "تم إضافة العميل بنجاح",
            "customer_updated" => "تم تعديل العميل بنجاح",
            "customer_deleted" => "تم حذف العميل بنجاح",
            "customer_restored" => "تم استعادة العميل بنجاح",
            "deleted_customers" => "العملاء المحذوفون",
            "is_new_customer" => "هل أنت عميل جديد؟",
            "phones" => "الهواتف",
    
    
            //problem
            "problem" => "المشكلة",
            "problems" => "المشاكل",
            "add_problem" => "إضافة مشكلة جديدة",
            "edit_problem" => "تعديل مشكلة",
            "problem_added" => "تم إضافة المشكلة بنجاح",
            "problem_updated" => "تم تعديل المشكلة بنجاح",
            "problem_deleted" => "تم حذف المشكلة بنجاح",
            "problem_restored" => "تم استعادة المشكلة بنجاح",
            "deleted_problems" => "المشاكل المحذوفة",
            "description" => "الوصف",
            "price" => "السعر",
            "paid" => "المدفوع",
            "due_time" => "ميعاد التسليم",
    
    
            //device
            "device" => "الجهاز",
            "devices" => "الأجهزة",
            "add_device" => "إضافة الجهاز",
            "edit_device" => "تعديل الجهاز",
            "device_added" => "تم إضافة الجهاز بنجاح",
            "device_updated" => "تم تعديل الجهاز بنجاح",
            "device_deleted" => "تم حذف الجهاز بنجاح",
            "device_restored" => "تم إستعادة الجهاز بنجاح",
            "deleted_devices" => "الأجهزة المحذوفة",
            "is_new_device"=>"هل هذا جهاز جديد؟",
    
    
            //employee
            "employee" => "الموظف",
            "employees" => "الموظفون",
            "add_employee" => "إضافة موظف جديد",
            "edit_employee" => "تعديل الموظف",
            "employee_added" => "تم إضافة الموظف بنجاح",
            "employee_updated" => "تم تعديل الموظف بنجاح",
            "employee_deleted" => "تم حذف الموظف بنجاح",
            "employee_restored" => "تم استعادة الموظف بنجاح",
            "deleted_employees" => "الموظفون المحذوفون",
    
    
            //branch
            "branch" => "الفرع",
            "branches" => "الفروع",
            "add_branch" => "إضافة فرع جديد",
            "edit_branch" => "تعديل فرع",
            "branch_added" => "تم إضافة الفرع بنجاح",
            "branch_updated" => "تم تعديل الفرع بنجاح",
            "branch_deleted" => "تم حذف الفرع بنجاح",
    
    
    
            //material
            "material" => "الخامة",
            "materials" => "الخامات",
            "add_material" => "إضافة خامة جديد",
            "edit_material" => "تعديل خامة",
            "material_added" => "تم إضافة الخامة بنجاح",
            "material_updated" => "تم تعديل الخامة بنجاح",
            "material_deleted" => "تم حذف الخامة بنجاح",
            "deleted_materials" => "الخامات المحذوفة",
            "material_restored"=>"تم إستعادة الخامة بنجاح",
    
            "name"=>"الإسم",
            "price"=>"السعر",
    
    
            //problems
            "cost"=>"التكلفة",
            "comment"=>"التعليق",
    
    
            //supply
            "supply" => "لازمة",
            "supplies" => "لوازم",
            "add_supply" => "إضافة لازمة",
            "edit_supply" => "تعديل لازمة",
            "supply_added" => "تم إضافة اللازمة بنجاح",
            "supply_updated" => "تم تعديل اللازمة بنجاح",
            "supply_deleted" => "تم حذف اللازمة بنجاح",
            "deleted_supplies" => "اللوازم المحذوفة",
            "supply_restored"=>"تم إستعادة اللازمة بنجاح",
    
            "name"=>"الإسم",
            "price"=>"السعر",
    
            //actions
            "add" => "إضافة",
            "edit" => "تعديل",
            "delete" => "حذف",
            "submit" => "تسجيل",
            "restore" => "استعادة",
            "force_delete" => "حذف تام",
            "manage" => "تحكم"
        ];
        
        $en = [
            "users" => "Users",
            "login" => "Login",
            "logout" => "Logout",
            "home"=>"Home",
            "attendance"=>"Attendance",
    
    
            //status
            "status" => "Status",
            "statuses" => "Statuses",
            "add_status" => "Add Status",
            "edit_status" => "Edit Status",
            "status_added" => "Status added Successfully",
            "status_updated" => "Status updated Successfully",
            "status_deleted" => "Status deleted Successfully",
    
            //customer
            "customer" => "Customer",
            "customers" => "Customers",
            "add_customer" => "Add Customer",
            "edit_customer" => "Edit Customer",
            "customer_added" => "Customer added Successfully",
            "customer_updated" => "Customer updated Successfully",
            "customer_deleted" => "Customer deleted Successfully",
            "customer_restored" => "Customer Restored Successfully",
            "deleted_customers" => "Deleted Customers",
            "is_new_customer" => "Is New Customer",
            "phones" => "Phones",
    
            //device
            "device" => "Device",
            "devices" => "Devices",
            "add_device" => "Add Device",
            "edit_device" => "Edit Device",
            "device_added" => "Device added Successfully",
            "device_updated" => "Device updated Successfully",
            "device_deleted" => "Device deleted Successfully",
            "device_restored" => "Device Restored Successfully",
            "deleted_devices" => "Deleted Devices",
            "is_new_device"=>"Is_New_Device",
    
            //problem
            "problem" => "Problem",
            "problems" => "Problems",
            "add_problem" => "Add Problem",
            "edit_problem" => "Edit Problem",
            "problem_added" => "Problem added Successfully",
            "problem_updated" => "Problem updated Successfully",
            "problem_deleted" => "Problem deleted Successfully",
            "problem_restored" => "Problem Restored Successfully",
            "deleted_problems" => "Deleted Problems",
            "description" => "Description",
            "price" => "Price",
            "paid" => "Paid",
            "due_time" => "Due Time",
            "comment"=>"Comment",
    
    
            //employee
            "employee" => "Employee",
            "employees" => "Employees",
            "add_employee" => "Add Employee",
            "edit_employee" => "Edit Employee",
            "employee_added" => "Employee added Successfully",
            "employee_updated" => "Employee updated Successfully",
            "employee_deleted" => "Employee deleted Successfully",
            "employee_restored" => "Employee Restored Successfully",
            "deleted_employees" => "Deleted Employees",
    
            //branch
            "branch" => "Branch",
            "branches" => "Branches",
            "add_branch" => "Add Branch",
            "edit_branch" => "Edit Branch",
            "branch_added" => "Branch added Successfully",
            "branch_updated" => "Branch updated Successfully",
            "branch_deleted" => "Branch deleted Successfully",
    
    
            //material
            "material" => "Material",
            "materials" => "Materials",
            "add_material" => "Add material",
            "edit_material" => "Edit material",
            "material_added" => "Material added Successfully",
            "material_updated" => "Material updated Successfully",
            "material_deleted" => "Material deleted Successfully",
            "deleted_materials" => "Deleted Materials",
            "material_restored"=>"Material restored Successfully",
    
            "name"=>"Name",
            "price"=>"Price",
    
    
            //problems
            "cost"=>"Cost",
    
            //supply
            "supply" => "Supply",
            "supplies" => "Supplies",
            "add_supply" => "Add supply",
            "edit_supply" => "Edit supply",
            "supply_added" => "Supply added Successfully",
            "supply_updated" => "Supply updated Successfully",
            "supply_deleted" => "Supply deleted Successfully",
            "deleted_supplies" => "Deleted Supplies",
            "supply_restored"=>"Supply restored Successfully",
            "name"=>"Name",
            "price"=>"Price",
    
            //actions
            "add" => "Add",
            "edit" => "Edit",
            "delete" => "Delete",
            "submit" => "Submit",
            "restore" => "Restore",
            "force_delete" => "Force Delete",
            "manage" => "Manage"
        ];

        foreach ($en as $key => $value) {
            $word = new Word();
            
            $word->word = $key;
            $word->ar = $ar[$key];
            $word->en = $value;
            
            $word->save();
        }
    
    
    }
}
