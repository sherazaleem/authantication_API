
<div class="flex flex-col">
<h4 class="py-4">Add Recipients</h4>
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <!-- <a href="" class="btn btn-primary">hi</a> -->
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
       
        <form action="{{url('recipients/added')}}" method="POST">
          @csrf
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="first_name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
               <div class="col-span-6 sm:col-span-4">
                <label for="email_address" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" name="email" id="email_address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Add
            </button>
          </div>
        </div>
      </form>
        <!-- This example requires Tailwind CSS v2.0+ -->