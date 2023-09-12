<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Sections\SectionRepositoryInterface;

class SectionController extends Controller
{

    private $sections;
  
    public function __construct(SectionRepositoryInterface $sections)
    {
        $this->sections = $sections;
    }
 



    public function index()
    {
      return $this->sections->index();
    }


    public function store(Request $request)
    {
        return $this->sections->store($request);
    }

    public function show($id)
    {
        return $this->sections->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        return $this->sections->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->sections->destroy($request);
    }
}
