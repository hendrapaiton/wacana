<template>
    <div class="flex h-screen bg-gray-200">
        <div class="bg-blue-600 text-white w-64 flex-shrink-0 hidden md:block">
            <div class="p-6">
                <a href="#" class="text-2xl font-bold">SchoolName</a>
            </div>
            <nav class="mt-10">
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 bg-blue-700">
                    <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-user-graduate mr-3"></i> Students
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-chalkboard-teacher mr-3"></i> Teachers
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-book mr-3"></i> Courses
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-calendar-alt mr-3"></i> Events
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-cogs mr-3"></i> Settings
                </a>
            </nav>
        </div>
        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <div class="p-2">
                    <h1 class="text-2xl font-bold">Dashboard</h1>
                </div>
                <div class="flex items-center space-x-4 relative">
                    <button class="text-gray-600 hover:text-gray-800 relative" id="notification-toggle">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-0 right-0 inline-block w-2 h-2 bg-red-600 rounded-full"></span>
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg overflow-hidden z-20 hidden"
                        id="notification-menu">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">New student enrolled</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">New course added</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Teacher assigned</a>
                    </div>
                    <button class="text-gray-600 hover:text-gray-800 relative" id="avatar-toggle">
                        <i class="fas fa-user-circle"></i>
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg overflow-hidden z-20 hidden"
                        id="avatar-menu">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Settings</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Logout</a>
                    </div>
                    <button class="text-gray-600 hover:text-gray-800 md:hidden" id="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </header>
            <div class="bg-blue-600 text-white w-64 flex-shrink-0 md:hidden fixed inset-y-0 left-0 transform -translate-x-full transition-transform duration-200 ease-in-out"
                id="mobile-menu">
                <div class="p-6">
                    <a href="#" class="text-2xl font-bold">SchoolName</a>
                </div>
                <nav class="mt-10">
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                        <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                    </a>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                        <i class="fas fa-user-graduate mr-3"></i> Students
                    </a>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                        <i class="fas fa-chalkboard-teacher mr-3"></i> Teachers
                    </a>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                        <i class="fas fa-book mr-3"></i> Courses
                    </a>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                        <i class="fas fa-calendar-alt mr-3"></i> Events
                    </a>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                        <i class="fas fa-cogs mr-3"></i> Settings
                    </a>
                </nav>
            </div>
            <main class="flex-1 p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-bold">Total Students</h2>
                                <p class="text-gray-600">1,234</p>
                            </div>
                            <i class="fas fa-user-graduate text-blue-600 text-4xl"></i>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-bold">Total Teachers</h2>
                                <p class="text-gray-600">123</p>
                            </div>
                            <i class="fas fa-chalkboard-teacher text-blue-600 text-4xl"></i>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-bold">Total Courses</h2>
                                <p class="text-gray-600">45</p>
                            </div>
                            <i class="fas fa-book text-blue-600 text-4xl"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <h2 class="text-2xl font-bold mb-4">Recent Activities</h2>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <ul>
                            <li class="flex items-center justify-between py-2 border-b">
                                <div>
                                    <p class="text-gray-800">New student enrolled: John Doe</p>
                                    <p class="text-gray-600 text-sm">2 hours ago</p>
                                </div>
                                <i class="fas fa-user-graduate text-blue-600"></i>
                            </li>
                            <li class="flex items-center justify-between py-2 border-b">
                                <div>
                                    <p class="text-gray-800">New course added: Advanced Mathematics</p>
                                    <p class="text-gray-600 text-sm">5 hours ago</p>
                                </div>
                                <i class="fas fa-book text-blue-600"></i>
                            </li>
                            <li class="flex items-center justify-between py-2 border-b">
                                <div>
                                    <p class="text-gray-800">Teacher assigned: Jane Smith</p>
                                    <p class="text-gray-600 text-sm">1 day ago</p>
                                </div>
                                <i class="fas fa-chalkboard-teacher text-blue-600"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>