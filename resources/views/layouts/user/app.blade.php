<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $app_name }}</title>

    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/main/app.css">

    <link rel="shortcut icon" href="{{ asset('mazer') }}/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('mazer') }}/assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/pages/fontawesome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/pages/datatables.css">
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/extensions/toastify-js/src/toastify.css" />
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/extensions/sweetalert2/sweetalert2.min.css" />
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/shared/iconly.css" />
    @stack('css')
</head>

<body>
    <div id="app">
        @include('layouts.user.data.sidebar')
        <div id="main" class='layout-navbar'>
            @include('layouts.user.data.navbar')
            <div id="main-content">
                <div class="page-heading">
                    @include('layouts.user.data.breadcrumbs')
                    <section class="section">
                        @yield('content')
                    </section>
                </div>
                @include('layouts.user.data.footer')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
    <script src="{{ asset('mazer') }}/assets/js/app.js"></script>

    <script src="{{ asset('mazer') }}/assets/extensions/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ asset('mazer') }}/assets/js/pages/datatables.js"></script>
    <script src="{{ asset('mazer') }}/assets/extensions/toastify-js/src/toastify.js"></script>
    <script src="{{ asset('mazer') }}/assets/js/pages/toastify.js"></script>

    <script src="{{ asset('mazer') }}/assets/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script>
        function hapus(url) {
            Swal.fire({
                title: "{{ __('message.dialog_title') }}",
                text: "{{ __('message.dialog_delete') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('message.dialog_yes') }}",
                cancelButtonText: "{{ __('message.dialog_no') }}",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        }
    </script>
    @if(session()->has('success'))
        <script>
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#4fbe87",
            }).showToast()
        </script>
    @endif
    <script>
        /*!
 * Color mode toggler for Bootstrap's docs (https://getbootstrap.com/)
 * Copyright 2011-2023 The Bootstrap Authors
 * Licensed under the Creative Commons Attribution 3.0 Unported License.
 */

(() => {
  'use strict'

  const getStoredTheme = () => localStorage.getItem('theme')
  const setStoredTheme = theme => localStorage.setItem('theme', theme)

  const getPreferredTheme = () => {
    const storedTheme = getStoredTheme()
    if (storedTheme) {
      return storedTheme
    }

    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
  }

  const setTheme = theme => {
    if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
      document.documentElement.setAttribute('data-bs-theme', 'dark')
    } else {
      document.documentElement.setAttribute('data-bs-theme', theme)
    }
  }

  setTheme(getPreferredTheme())

  const showActiveTheme = (theme, focus = false) => {
    const themeSwitcher = document.querySelector('#bd-theme')

    if (!themeSwitcher) {
      return
    }

    const themeSwitcherText = document.querySelector('#bd-theme-text')
    const activeThemeIcon = document.querySelector('.theme-icon-active')
    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
    const iconOfActiveBtn = btnToActive.querySelector('i').dataset.themeIcon

    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
      element.classList.remove('active')
      element.setAttribute('aria-pressed', 'false')
    })

    btnToActive.classList.add('active')
    btnToActive.setAttribute('aria-pressed', 'true')
    activeThemeIcon.classList.remove(activeThemeIcon.dataset.themeIconActive)
    activeThemeIcon.classList.add(iconOfActiveBtn)
    activeThemeIcon.dataset.iconActive = iconOfActiveBtn
    const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`
    themeSwitcher.setAttribute('aria-label', themeSwitcherLabel)

    if (focus) {
      themeSwitcher.focus()
    }
  }

  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
    const storedTheme = getStoredTheme()
    if (storedTheme !== 'light' && storedTheme !== 'dark') {
      setTheme(getPreferredTheme())
    }
  })

  window.addEventListener('DOMContentLoaded', () => {
    showActiveTheme(getPreferredTheme())

    document.querySelectorAll('[data-bs-theme-value]')
      .forEach(toggle => {
        toggle.addEventListener('click', () => {
          const theme = toggle.getAttribute('data-bs-theme-value')
          setStoredTheme(theme)
          setTheme(theme)
          showActiveTheme(theme, true)
        })
      })
  })
})()
    </script>
    @stack('js')
</body>

</html>
