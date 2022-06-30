<?php 

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Product Category
Breadcrumbs::for('productCategories.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Product Category', route('productCategories.index'));
});
Breadcrumbs::for('productCategories.create', function ($trail) {
    $trail->parent('productCategories.index');
    $trail->push('Add Category', route('productCategories.create'));
});
Breadcrumbs::for('productCategories.show', function ($trail, $productCategory) {
    $trail->parent('productCategories.index');
    $trail->push('View Category', route('productCategories.show', $productCategory->id));
});
Breadcrumbs::for('productCategories.edit', function ($trail, $productCategory) {
    $trail->parent('productCategories.index');
    $trail->push('Edit Category', route('productCategories.edit', $productCategory->id));
});

// Supplier
Breadcrumbs::for('suppliers.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Suppliers', route('suppliers.index'));
});
Breadcrumbs::for('suppliers.create', function ($trail) {
    $trail->parent('suppliers.index');
    $trail->push('Add Supplier', route('suppliers.create'));
});
Breadcrumbs::for('suppliers.show', function ($trail, $supplier) {
    $trail->parent('suppliers.index');
    $trail->push('View Supplier', route('suppliers.show', $supplier->id));
});
Breadcrumbs::for('suppliers.edit', function ($trail, $supplier) {
    $trail->parent('suppliers.index');
    $trail->push('Edit Supplier', route('suppliers.edit', $supplier->id));
});

// Roles
Breadcrumbs::for('roles.index', function ($trail) {
    $trail->push('Roles', route('roles.index'));
});
Breadcrumbs::for('roles.create', function ($trail) {
    $trail->parent('roles.index');
    $trail->push('Add Role', route('roles.create'));
});
Breadcrumbs::for('roles.show', function ($trail, $role) {
    $trail->parent('roles.index');
    //$trail->push('View Role', route('roles.show', $role->id));
});
Breadcrumbs::for('roles.edit', function ($trail, $role) {
    $trail->parent('roles.index');
    //$trail->push('Edit Role', route('roles.edit', $role->id));
});

// Permissions
Breadcrumbs::for('permissions.index', function ($trail) {
    $trail->push('Permissions', route('permissions.index'));
});
Breadcrumbs::for('permissions.create', function ($trail) {
    $trail->parent('permissions.index');
    $trail->push('Add Permission', route('permissions.create'));
});
Breadcrumbs::for('permissions.show', function ($trail, $permission) {
    $trail->parent('permissions.index');
    //$trail->push('View Permission', route('permissions.show', $permission->id));
});
Breadcrumbs::for('permissions.edit', function ($trail, $permission) {
    $trail->parent('permissions.index');
    //$trail->push('Edit Permission', route('permissions.edit', $permission->id));
});

// Users
Breadcrumbs::for('users.index', function ($trail) {
    $trail->push('Staffs', route('users.index'));
});
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users.index');
    $trail->push('Add Staff', route('users.create'));
});
Breadcrumbs::for('users.show', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->push('View Staff', route('users.show', $user->id));
});
Breadcrumbs::for('users.edit', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->push('Edit Staff', route('users.edit', $user->id));
});


// Customers
Breadcrumbs::for('customers.index', function ($trail) {
    $trail->push('Customers', route('customers.index'));
});
Breadcrumbs::for('customers.create', function ($trail) {
    $trail->parent('customers.index');
    $trail->push('Add Customers', route('customers.create'));
});
Breadcrumbs::for('customers.show', function ($trail, $customer) {
    $trail->parent('customers.index');
    $trail->push('View Customers', route('customers.show', $customer->id));
});
Breadcrumbs::for('customers.edit', function ($trail, $customer) {
    $trail->parent('customers.index');
    $trail->push('Edit Customers', route('customers.edit', $customer->id));
});

// Expense Type
Breadcrumbs::for('expenseTypes.index', function ($trail) {
    $trail->push('Expense Type', route('expenseTypes.index'));
});
Breadcrumbs::for('expenseTypes.create', function ($trail) {
    $trail->parent('expenseTypes.index');
    $trail->push('Add Expense Type', route('expenseTypes.create'));
});
Breadcrumbs::for('expenseTypes.show', function ($trail, $expenseType) {
    $trail->parent('expenseTypes.index');
    $trail->push('View Expense Type', route('expenseTypes.show', $expenseType->id));
});
Breadcrumbs::for('expenseTypes.edit', function ($trail, $expenseType) {
    $trail->parent('expenseTypes.index');
    $trail->push('Edit Expense Type', route('expenseTypes.edit', $expenseType->id));
});

// Expense
Breadcrumbs::for('expenses.index', function ($trail) {
    $trail->push('Expenses Invoice', route('expenses.index'));
});
Breadcrumbs::for('expenses.create', function ($trail) {
    $trail->parent('expenses.index');
    $trail->push('Add Expense Invoice', route('expenses.create'));
});
Breadcrumbs::for('expenses.show', function ($trail, $expense) {
    $trail->parent('expenses.index');
    $trail->push('View Expense Invoice', route('expenses.show', $expense->id));
});
Breadcrumbs::for('expenses.edit', function ($trail, $expense) {
    $trail->parent('expenses.index');
    $trail->push('Edit Expense Invoice', route('expenses.edit', $expense->id));
});

// Warehouse
Breadcrumbs::for('warehouses.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Warehouses', route('warehouses.index'));
});
Breadcrumbs::for('warehouses.create', function ($trail) {
    $trail->parent('warehouses.index');
    $trail->push('Add Warehouse', route('warehouses.create'));
});
Breadcrumbs::for('warehouses.show', function ($trail, $warehouse) {
    $trail->parent('warehouses.index');
    $trail->push('View Warehouse', route('warehouses.show', $warehouse->id));
});
Breadcrumbs::for('warehouses.edit', function ($trail, $warehouse) {
    $trail->parent('warehouses.index');
    $trail->push('Edit Warehouse', route('warehouses.edit', $warehouse->id));
});

// Products
Breadcrumbs::for('products.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Products', route('products.index'));
});
Breadcrumbs::for('products.create', function ($trail) {
    $trail->parent('products.index');
    $trail->push('Add Product', route('products.create'));
});
Breadcrumbs::for('products.show', function ($trail, $product) {
    $trail->parent('products.index');
    $trail->push('View Product', route('products.show', $product->id));
});
Breadcrumbs::for('products.edit', function ($trail, $product) {
    $trail->parent('products.index');
    $trail->push('Edit Product', route('products.edit', $product->id));
});

// Loaners
Breadcrumbs::for('loaners.index', function ($trail) {
    $trail->push('Loaners', route('loaners.index'));
});
Breadcrumbs::for('loaners.create', function ($trail) {
    $trail->parent('loaners.index');
    $trail->push('Add Loaner', route('loaners.create'));
});
Breadcrumbs::for('loaners.show', function ($trail, $loaner) {
    $trail->parent('loaners.index');
    $trail->push('View Loaner', route('loaners.show', $loaner->id));
});
Breadcrumbs::for('loaners.edit', function ($trail, $loaner) {
    $trail->parent('loaners.index');
    $trail->push('Edit Loaner', route('loaners.edit', $loaner->id));
});

// Invoice
Breadcrumbs::for('invoices.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Invoices', route('invoices.index'));
});
Breadcrumbs::for('invoices.create', function ($trail) {
    $trail->parent('invoices.index');
    $trail->push('Add Invoice', route('invoices.create'));
});
Breadcrumbs::for('invoices.show', function ($trail, $invoice) {
    $trail->parent('invoices.index');
    $trail->push('View Invoice', route('invoices.show', $invoice->id));
});
Breadcrumbs::for('invoices.edit', function ($trail, $invoice) {
    $trail->parent('invoices.index');
    $trail->push('Edit Invoice', route('invoices.edit', $invoice->id));
});


// Comoany
Breadcrumbs::for('companies.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Company Profile', route('companies.index'));
});


