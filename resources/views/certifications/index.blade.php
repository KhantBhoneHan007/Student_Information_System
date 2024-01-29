<x-app-layout>

   <x-slot name="header">
      <div class="flex justify-between items-center">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Certifications') }}
         </h2>
         <button data-modal-target="create_model" data-modal-toggle="create_model" type="button"
            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700
             dark:border-gray-700">Create
            Certification</button>
      </div>

   </x-slot>

   <div class="py-12">

      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         @if (session('deleted'))
            <div id="alert-2"
               class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
               role="alert">
               <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor" viewBox="0 0 20 20">
                  <path
                     d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
               </svg>
               <span class="sr-only">Info</span>
               <div class="ms-3 text-sm font-medium">
                  {{ session('deleted') }}
               </div>
               <button type="button"
                  class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                  data-dismiss-target="#alert-2" aria-label="Close">
                  <span class="sr-only">Close</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
               </button>
            </div>
            <div class="alert alert-success"></div>
         @endif
         @if (session('success'))
            <div id="alert-3"
               class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
               role="alert">
               <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor" viewBox="0 0 20 20">
                  <path
                     d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
               </svg>
               <span class="sr-only">Info</span>
               <div class="ms-3 text-sm font-medium">
                  {{ session('success') }}
               </div>
               <button type="button"
                  class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                  data-dismiss-target="#alert-3" aria-label="Close">
                  <span class="sr-only">Close</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
               </button>
            </div>
         @endif
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
               <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                     <tr>
                        <th scope="col" class="px-6 py-3">
                           id
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Certification Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Created At
                        </th>
                        <th scope="col" class="px-6 py-3 align-middle">
                           Updated At
                        </th>
                        <th scope="col" class="px-6 py-3 flex justify-center">
                           action
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($certifications as $certification)
                        <tr
                           class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                           <th scope="row"
                              class="w-[10px] px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              {{ $certification->id }}
                           </th>
                           <td class="px-6 py-4 ">
                              {{ $certification->name }}
                           </td>
                           <td class="px-6 py-4 w-[120px]">
                              {{ \Carbon\Carbon::parse($certification->created_at)->format('y-m-d') }}
                           </td>
                           <td class="px-6 py-4 w-[120px]">
                              {{ \Carbon\Carbon::parse($certification->updated_at)->format('y-m-d') }}
                           </td>
                           <td class="flex px-6 py-4 justify-center whitespace-nowrap">
                              <button type="button" data-modal-target="edit_model_{{ $certification->id }}"
                                 data-modal-toggle="edit_model_{{ $certification->id }}"
                                 class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-[12px] py-[2px] text-center me-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600
                                 dark:focus:ring-green-800">Edit</button>
                              <form action="{{ route('certifications.destroy', ['certification' => $certification->id]) }}"
                                 method="POST" id="deleteForm">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit"
                                    class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-[12px] py-[2px] text-center me-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600
                               dark:focus:ring-red-900">Delete</button>
                              </form>
                           </td>

                           <!-- edit modal -->
                           <div id="edit_model_{{ $certification->id }}" tabindex="-1" aria-hidden="true"
                              class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                              <div class="relative p-4 w-full max-w-md max-h-full">
                                 <!-- Modal content -->
                                 <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                       class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                       <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                          Edit Certification
                                       </h3>
                                       <button type="button"
                                          class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                          data-modal-hide="edit_model_{{ $certification->id }}">
                                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 14 14">
                                             <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                          </svg>
                                          <span class="sr-only">Close modal</span>
                                       </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5">
                                       <form class="space-y-4" method="POST"
                                          action="{{ route('certifications.update', ['certification' => $certification->id]) }}">
                                          @csrf
                                          @method('PUT')

                                          <div>
                                             <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Certification
                                                Name</label>
                                             <input type="name" name="name" id="name"
                                                value="{{ old('name', $certification->name) }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required>
                                          </div>
                                          <button type="submit"
                                             class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                          Update Certification</button>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>

         </div>
      </div>
   </div>

   <!-- Main Create modal -->
   <div id="create_model" tabindex="-1" aria-hidden="true"
      class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
               <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                  Create New Certification
               </h3>
               <button type="button"
                  class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                  data-modal-hide="create_model">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
                  <span class="sr-only">Close modal</span>
               </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
               <form class="space-y-4" method="POST" action="{{ route('certifications.store') }}">
                  @csrf
                  <div>
                     <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Certification Name</label>
                     <input type="name" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required>
                  </div>
                  @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                     </div>
                  @endif
                  <button type="submit"
                     class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                     certification</button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <script>
      document.getElementById('deleteForm').addEventListener('submit', function(event) {
         event.preventDefault(); // Prevent the default form submission

         Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
         }).then((result) => {
            if (result.isConfirmed) {
               Swal.fire({
                  title: "Deleted!",
                  text: "Your file has been deleted.",
                  icon: "success"
               });
               this.submit();
            }
         });
      });
   </script>

</x-app-layout>
