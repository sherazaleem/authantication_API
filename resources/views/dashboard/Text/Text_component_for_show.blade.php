<div class="flex flex-col">
<h4 class="py-4">Text Notes Record</h4>
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
    	<!-- <a href="" class="btn btn-primary">hi</a> -->
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
      	<a href="{{url('text/add')}}" class="btn btn-primary float-right">Add Text Notes</a>
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Id
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Title
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Discription
              </th>
              <th scope="col" class="px-8 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                is_text_notes
              </th>
              <th scope="col" class="px-7 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                 status
              </th>
              <th scope="col" class=" pr-4 py-3  text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($text as $txt)
               <tr class="bg-white">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                {{$txt->id}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$txt->title}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$txt->description}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$txt->is_text_note}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$txt->status}}
              </td>
              
              <td class="pr-4 py-4 whitespace-nowrap text-center text-sm font-medium">
                <a href="{{url('text/update',$txt->id)}}" class="text-indigo-600 hover:text-indigo-900 pr-3">Edit</a>
                <a href="{{url('text/deleted',$txt->id)}}" class="text-indigo-600 hover:text-indigo-900">Delete</a>
              </td>
            </tr>
           @endforeach
            <!-- More people... -->
          </tbody>
        </table>
        <!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
  <div class=" sm:flex-1 sm:flex sm:items-center sm:justify-between">
    <div>
      <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
        <div class="sm:flex sm:items-center sm:justify-between">{{ $text->links() }}</div>
      </nav>
    </div>
  </div>
</div>