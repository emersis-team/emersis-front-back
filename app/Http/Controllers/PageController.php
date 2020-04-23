<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConsultaRecibida;
use App\Models\Consulta;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
	public function showHome()
	{
		return view('pages.common.home');
	}

	public function showAboutUs()
	{
		return view('pages.common.quees');
	}

	public function showContact()
	{
		return view('pages.common.contacto');
	}

	public function postContact()
	{

		$mensaje = request()->validate([
			'name' => 'required',
			'email' => 'required|email',
			'subject' => 'required',
			'body' => 'required',
		], [
			'name.required' => __('El campo Nombre es Requerido'),
			'email.required' => __('El campo Email es Requerido'),
			'email.email' => __('El campo Email es debe cotener un @'),
			'subject.required' => __('El campo Asunto es Requerido'),
			'body.required' => __('El campo Consulta es Requerido')
		]);

		try {

			if (Auth::check()) {
				$mensaje['user_id'] = Auth::user()->id;
			}

			$consulta = Consulta::create($mensaje);

			if(!$consulta) {
				throw new \Error('Error al crear la consulta');
			}

			Mail::to($mensaje['email'])->queue(new ConsultaRecibida($mensaje));

			return response()->json([
				'status' => 200,
				'message' => __('consultas.alert_recibida'),
			]);
		} catch (\Throwable $e) {

			return response()->json([
				'status' => $e->getCode() ? $e->getCode() : 500,
				'message' => $e->getMessage()
			]);
		}
	}

	public function showTerms()
	{
		return view('pages.common.terminos');
	}
}
