@extends('layouts.app')

@section('content')

  <section class="page-section clearfix">
    <div class="container">
      <div class="intro">
        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="{{asset('image/intro.jpg')}}" alt="">
        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <h2 class="section-heading mb-4">
            <span class="section-heading-lower"><b>Hassle Free!</b></span>
          </h2>
          <p class="mb-3">Submit your documents & requirements at the comfort of your own home</p>
          <div class="intro-button mx-auto">
            <a class="btn btn-primary btn-xl" href="#">Request Today!</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">My Requests</span>
            </h2>
            <table>
              <thead>
                <tr>
                  <th scope="col">Request/s</th>
                  <th scope="col">Status</th>
                  <th scope="col">Request Date</th>
                  <th scope="col">Due Date</th>
                  <th scope="col">ID</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-label="Request">...</td>
                  <td data-label="Status">...</td>
                  <td data-label="Request Date">...</td>
                  <td data-label="Due Date">...</td>
                  <td data-label="ID">...</td>
                  <td data-label="Action">...</td>
                </tr>
                <tr>
                  <td data-label="Request">...</td>
                  <td data-label="Status">...</td>
                  <td data-label="Request Date">...</td>
                  <td data-label="Due Date">...</td>
                  <td data-label="ID">...</td>
                  <td data-label="Action">...</td>
                </tr>
                <tr>
                  <td data-label="Request">...</td>
                  <td data-label="Status">...</td>
                  <td data-label="Request Date">...</td>
                  <td data-label="Due Date">...</td>
                  <td data-label="ID">...</td>
                  <td data-label="Action">...</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
