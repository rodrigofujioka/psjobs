<?php

namespace App\Http\Controllers;

use App\Oportunidades;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @author Vinícius Enéas Bezerra <vinicius.eneas@gmail.com>
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);

        return view('admin.home');
    }

    /**
     * @author Vinícius Enéas Bezerra <vinicius.eneas@gmail.com>
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function inscritos(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);

        return view('admin.home');
    }
}
