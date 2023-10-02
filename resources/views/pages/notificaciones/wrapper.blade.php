@extends('layouts.main')
@section('content')
<div class="animate__animated p-6">
    <div class="relative flex h-full gap-5 sm:h-[calc(100vh_-_150px)]">
        <div class="panel h-full flex-1 overflow-auto p-0">
            <div class="flex h-full flex-col">
                <h2 class="text-2xl p-4">Notificaciones</h2>
                <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                @if (count($list) > 0)
                <div class="table-responsive min-h-[400px] grow overflow-y-auto sm:min-h-[300px]">
                    <table class="table-hover">
                        <tbody>
                            @foreach ($list as $item)
                            <tr
                                class="group"
                            >
                                <td>
                                    <div>
                                        <div
                                            class="whitespace-nowrap text-base font-semibold group-hover:text-primary"
                                        >{{ $item->titulo }}</div>
                                        <div
                                            class="min-w-[300px] overflow-hidden text-white-dark line-clamp-1"
                                        >{{ $item->mensaje }}</div>
                                    </div>
                                </td>
                                <td class="w-1">
                                    <p
                                        class="whitespace-nowrap font-medium text-white-dark"
                                    >{{ $item->fecha }}</p>
                                </td>
                                <td class="w-1">
                                    <div class="flex w-max items-center justify-between">
                                        <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                            <button type="button" @click="toggle">
                                                <svg
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 rotate-90 opacity-70"
                                                >
                                                    <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                    <circle
                                                        opacity="0.5"
                                                        cx="12"
                                                        cy="12"
                                                        r="2"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                    ></circle>
                                                    <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                </svg>
                                            </button>
                                            <ul
                                                    x-cloak
                                                    x-show="open"
                                                    x-transition
                                                    x-transition.duration.300ms
                                                    class="whitespace-nowrap ltr:right-0 rtl:left-0"
                                                >
                                                <li>
                                                    <form method="post" action="/notificaciones/{{ $item->id }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="flex gap-1" type="submit" @click="toggle">
                                                            <svg
                                                                width="24"
                                                                height="24"
                                                                viewBox="0 0 24 24"
                                                                fill="none"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2"
                                                            >
                                                                <path
                                                                    d="M20.5001 6H3.5"
                                                                    stroke="currentColor"
                                                                    stroke-width="1.5"
                                                                    stroke-linecap="round"
                                                                ></path>
                                                                <path
                                                                    d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                                                    stroke="currentColor"
                                                                    stroke-width="1.5"
                                                                    stroke-linecap="round"
                                                                ></path>
                                                                <path
                                                                    opacity="0.5"
                                                                    d="M9.5 11L10 16"
                                                                    stroke="currentColor"
                                                                    stroke-width="1.5"
                                                                    stroke-linecap="round"
                                                                ></path>
                                                                <path
                                                                    opacity="0.5"
                                                                    d="M14.5 11L14 16"
                                                                    stroke="currentColor"
                                                                    stroke-width="1.5"
                                                                    stroke-linecap="round"
                                                                ></path>
                                                                <path
                                                                    opacity="0.5"
                                                                    d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                                                    stroke="currentColor"
                                                                    stroke-width="1.5"
                                                                ></path>
                                                            </svg>
                                                            Eliminar</button>
                                                    </form>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                @if (count($list) == 0)
                <div class="flex h-full min-h-[400px] items-center justify-center text-lg font-semibold sm:min-h-[300px]">
                    Sin notificaciones
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
