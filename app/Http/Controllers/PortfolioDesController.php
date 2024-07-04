<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioDes;
use Illuminate\Http\Request;

class PortfolioDesController extends Controller
{
    public function store(Portfolio $portfolio){

        $description = new PortfolioDes();
        $description->portfolio_id = $portfolio->id;
        $description->des = request()->get('des');
        $description->save();

        return $description;
    }

    public function show(Portfolio $portfolio){
        $id = $portfolio->id;
        $test = PortfolioDes::where('portfolio_id', $id)->get();

        return $test;
    }

    public function edit($request){
        $test = PortfolioDes::where('id', $request)->get();
        return $test;
    }

    public function update(Request $request, PortfolioDes $portfolioDes){


        return $portfolioDes;
    }
}