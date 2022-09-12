@extends('layout')

@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">
            
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">
                                Ejercicio ELA
                            </div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-4 text-gray-600 dark:text-gray-400 " style="text-align: justify;">
                                Mantemientos a cooperantes, proyectos y asignaciones. <br>
                                Generación de informe dentro de cooperantes para ver sus asignaciones.<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">
                        Alejandro Ernesto Figueroa Rivas
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    ELA 2022.
                </div>
            </div>
        </div>
    </div>
@endsection