//code for search item in POS
// Fixed code for search item in POS
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('[data-category]');
    const filterItems = document.querySelectorAll('.filter-item');
    const searchInput = document.getElementById('searchInput');
    const noResultsMessage = document.getElementById('no-results');
    const searchIcon = document.querySelector('.search-icon');
    
    let currentCategory = 'all';
    let currentSearch = '';
    let searchTimeout;

    // Apply both filters
    function applyFilters() {
        let visibleCount = 0;
        
        filterItems.forEach(item => {
            const itemCategory = item.getAttribute('data-category');
            const searchableText = item.getAttribute('data-searchable') || '';
            const itemText = item.textContent.toLowerCase(); // Fallback to text content
            
            // Check category match
            const categoryMatch = currentCategory === 'all' || itemCategory === currentCategory;
            
            // Check search match - use both data attribute and text content
            const searchText = searchableText || itemText;
            const searchMatch = currentSearch === '' || 
                               searchText.toLowerCase().includes(currentSearch) ||
                               itemText.includes(currentSearch);
            
            if (categoryMatch && searchMatch) {
                // Show item
                item.style.display = 'block';
                item.classList.remove('fade-out', 'hidden');
                visibleCount++;
            } else {
                // Hide item with animation
                item.classList.add('fade-out');
                setTimeout(() => {
                    item.style.display = 'none';
                    item.classList.add('hidden');
                }, 300);
            }
        });
        
        // Show/hide no results message
        setTimeout(() => {
            if (visibleCount === 0) {
                noResultsMessage.style.display = 'block';
                noResultsMessage.classList.remove('hidden');
            } else {
                noResultsMessage.style.display = 'none';
                noResultsMessage.classList.add('hidden');
            }
        }, 300);
    }

    // Category button event listeners
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            currentCategory = this.getAttribute('data-category');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            applyFilters();
        });
    });

    // Search input event listener with debounce
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        
        searchTimeout = setTimeout(() => {
            currentSearch = this.value.trim().toLowerCase();
            applyFilters();
        }, 300); // 300ms debounce delay
    });

    // Clear search when clicking the search icon
    if (searchIcon) {
        searchIcon.addEventListener('click', function() {
            searchInput.value = '';
            currentSearch = '';
            applyFilters();
            searchInput.focus();
        });
    }

    // Handle Enter key in search
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            currentSearch = this.value.trim().toLowerCase();
            applyFilters();
        }
    });

    // Initial filter application
    applyFilters();
});
// End fixed code for search item in POS
//End code for search item in POS


// ============================================
//        code for Add item to card
// ============================================

let cart = [];

// Clear cart when page reloads
window.onload = function () {
  cart = [];
  calculateCart();
};

// Add product to cart
function addToCart(id, name, price) {
  let existing = cart.find(p => p.id === id);
  if (existing) {
    existing.qty += 1;
  } else {
    cart.push({
      id: id,
      name: name,
      mrp: price,
      qty: 1,
      rate: price,
      total: price,
      disc: 0,
      taxAmt: 0,
      cgst: 0,
      sgst: 0,
      totalAmt: price
    });
  }
  calculateCart();
}

// Update fields dynamically
function updateItem(id, field, value) {
  let item = cart.find(p => p.id === id);
  if (!item) return;
  item[field] = parseFloat(value) || 0;
  calculateCart();
}

// Remove item
function removeItem(id) {
  cart = cart.filter(p => p.id !== id);
  calculateCart();
}

// Recalculate all items
function calculateCart() {
  let tbody = document.getElementById("cartTableBody");
  tbody.innerHTML = "";
  let grandTotal = 0;

  if (cart.length === 0) {
    tbody.innerHTML = `<tr><td colspan="11" class="text-muted">Cart is empty</td></tr>`;
    document.getElementById("grandTotal").innerText = "0.00";
    return;
  }

  cart.forEach(item => {
    item.total = item.qty * item.rate;

    // Example: 5% GST
    let taxRate = 0.00;
    item.taxAmt = item.total * taxRate;
    item.cgst = item.taxAmt / 2;
    item.sgst = item.taxAmt / 2;

    item.totalAmt = item.total - item.disc + item.taxAmt;
    grandTotal += item.totalAmt;

    tbody.innerHTML += `
      <tr>
        <td>${item.name}</td>
        <td><input type="number" class="form-control form-control-sm"
                   value="${item.mrp}" onchange="updateItem(${item.id}, 'mrp', this.value)"></td>
        <td><input type="number" class="form-control form-control-sm text-center"
                   value="${item.qty}" min="1" onchange="updateItem(${item.id}, 'qty', this.value)"></td>
        <td><input type="number" class="form-control form-control-sm"
                   value="${item.rate}" onchange="updateItem(${item.id}, 'rate', this.value)"></td>
        <td>${item.total.toFixed(2)}</td>
        <td><input type="number" class="form-control form-control-sm"
                   value="${item.disc}" onchange="updateItem(${item.id}, 'disc', this.value)"></td>
        <td>${item.taxAmt.toFixed(2)}</td>
        <td>${item.cgst.toFixed(2)}</td>
        <td>${item.sgst.toFixed(2)}</td>
        <td>${item.totalAmt.toFixed(2)}</td>
        <td><button class="btn btn-sm btn-danger" onclick="removeItem(${item.id})">
              <i class="fas fa-trash"></i>
            </button></td>
      </tr>
    `;
  });

  document.getElementById("grandTotal").innerText = grandTotal.toFixed(2);
}


// ============================================
//      End of  code for Add item to card
// ============================================



// ============================================
//     Add item to cart
// ============================================
async function checkout() {
    if (!cart.length) {
        alert("Cart is empty");
        return;
    }

    let customerSelect = document.getElementById("customerSelect");
    let customerId = customerSelect ? customerSelect.value : null;
    let customerName = (customerSelect && customerSelect.selectedOptions.length > 0) 
        ? customerSelect.selectedOptions[0].text 
        : null;

    let tokenElement = document.querySelector('meta[name="csrf-token"]');
    if (!tokenElement) {
        alert("CSRF token not found. Please add <meta name='csrf-token' content='{{ csrf_token() }}'> in your layout.");
        return;
    }
    let token = tokenElement.getAttribute('content');

    const payload = {
        customer_id: customerId || null,
        customer_name: customerName,
        cart: cart
    };

    try {
        let res = await fetch("/sales", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token,
                "Accept": "application/json"
            },
            body: JSON.stringify(payload)
        });

        let data = await res.json();

        if (data.status === "success") {
            alert("Sale Saved! Invoice ID: " + data.sale_id);
            window.location.href = "/sales/" + data.sale_id; // redirect to receipt
        } else {
            alert("Error: " + data.message);
        }
    } catch (error) {
        console.error("Checkout failed:", error);
        alert("Something went wrong while saving the sale.");
    }
}

// ============================================
//     End Add item to cart
// ============================================

// Medicine Category Filter Function






document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll("[data-category]");
    const items = document.querySelectorAll(".filter-item");

    buttons.forEach(button => {
        button.addEventListener("click", function () {
            // Reset active button
            buttons.forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");

            const category = this.getAttribute("data-category");
            console.log(category)
            items.forEach(item => {
                const itemCategory = item.getAttribute("data-category");

                if (category === "all" || itemCategory == category) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        });
    });
});




