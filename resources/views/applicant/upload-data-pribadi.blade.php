  @extends('applicant.layouts.layout-applicant')
  @section('content')
    <div class="px-32 py-16">
      <form action="{{ route('applicant.uploadDP.store') }}" method="POST">
        @csrf
      
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="font-semibold text-gray-900 text-3xl">Data Pribadi</h2>
            <p class="mt-1 text-sm/6 text-gray-600">Mohon isi data pribadi dengan benar dan lengkap!</p>
      
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="idApplicant" class="block text-sm/6 font-medium text-gray-900">ID</label>
                <div class="mt-2">
                  <input type="text" name="idAppliacant" id="idAppliacant" placeholder="ID" autocomplete="idApplicant" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>
              </div>

              <div class="sm:col-span-3">
                <label for="name" class="block text-sm/6 font-medium text-gray-900">Nama Lengkap</label>
                <div class="mt-2">
                  <input type="text" name="name" id="name" placeholder="Nama Lengkap" autocomplete="given-name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>
              </div>
              
              <div class="sm:col-span-3">
                <label for="gender" class="block text-sm/6 font-medium text-gray-900">Jenis Kelamin</label>
                <div class="mt-2 grid grid-cols-1">
                  <select id="gender" name="gender" autocomplete="gender" placeholder="Jenis Kelamin" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                    <option value ="" disabled selected>Jenis Kelamin</option>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                  </select>
                  <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>

              <div class="sm:col-span-4">
                <label for="dob" class="block text-sm/6 font-medium text-gray-900">Tanggal Lahir</label>
                <div class="mt-2">
                  <input id="dob" name="dob" type="date" placeholder="Tanggal Kedatangan" autocomplete="dob" class="block w-50 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>
              </div>
      
              
              <div class="sm:col-span-4">
                <label for="motherName" class="block text-sm/6 font-medium text-gray-900">Nama Ibu</label>
                <div class="mt-2">
                  <input id="motherName" name="motherName" type="text" placeholder="Nama Ibu" autocomplete="motherName" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>
              </div>

              <div class="sm:col-span-4">
                <label for="phoneNo" class="block text-sm/6 font-medium text-gray-900">Nomor Telepon</label>
                <div class="mt-2">
                  <input id="phoneNo" name="phoneNo" type="number" placeholder="Nomor Telepon" autocomplete="phoneNo" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>
              </div>

              <div class="sm:col-span-4">
                <label for="emailAddress" class="block text-sm/6 font-medium text-gray-900">Alamat Email</label>
                <div class="mt-2">
                  <input id="emailAddress" name="emailAddress" type="email" placeholder="Alamat Email" autocomplete="emailAddress" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>
              </div>

              <div class="sm:col-span-4">
                <label for="profession" class="block text-sm/6 font-medium text-gray-900">profession</label>
                <div class="mt-2">
                  <input id="profession" name="profession" type="text" placeholder="profession" autocomplete="profession" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>
              </div>
      
              <div class="col-span-full">
                <label for="address" class="block text-sm/6 font-medium text-gray-900">Alamat Rumah</label>
                <div class="mt-2">
                  <input id="address" name="address" type="text" placeholder="Alamat Rumah" autocomplete="address" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>
              </div>

            </div>
          </div>
    
      
        <div class="mt-6 flex items-center justify-end gap-x-8 px-16 py-8">
          <button type="submit">Simpan</button>
          @if(session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
          <a href="{{ route('applicant.uploadDoc') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white bg-blue-500 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
            Selanjutnya &raquo;
            </a>
        </div>
      </form>
    </div>  
  @endsection