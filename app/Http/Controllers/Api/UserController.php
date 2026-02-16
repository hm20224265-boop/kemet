<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // جلب قائمة المستخدمين (للمسؤول فقط مثلاً)
    public function index()
    {
        // نختار فقط الحقول التي نريد إظهارها في الهوم أو لوحة التحكم
        $users = User::select('id', 'first_name', 'last_name', 'email', 'phone', 'role_admin')->get();

        return response()->json([
            'status' => 'success',
            'count' => $users->count(),
            'data' => $users
        ]);
    }

    // جلب بيانات مستخدم محدد مع حجوزاته (بناءً على الـ ERD)
    public function show($id)
    {
        // محاولة جلب المستخدم مع علاقاته (إذا أردتِ عرض تاريخ حجوزاته بالهوم)
        $user = User::with(['bookings', 'reviews'])->find($id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }
}
