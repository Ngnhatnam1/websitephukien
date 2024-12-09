/*-- sidebar cho Admin --*/
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
}


function filterAccounts(userType) {
    const accountDetails = document.getElementById('account-details');
    const accountInfo = document.getElementById('account-info');
    accountDetails.style.display = 'block';
    accountInfo.innerHTML = '';

    let url = 'model/getuserinfo.php?user_type=' + userType; // Gửi yêu cầu để lọc theo 'admin' hoặc 'user'

    // Gửi yêu cầu AJAX đến getuserinfo.php
    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                let tableHTML = `<table><tr><th>Tên Khách</th><th>Email</th><th>Password</th><th>Loại người dùng</th></tr>`;
                data.forEach(item => {
                    tableHTML += `
                        <tr>
                            <td>${item.name}</td>
                            <td>${item.email}</td>
                            <td>${item.password}</td>
                            <td>${item.user_type}</td>
                        </tr>
                    `;
                });
                tableHTML += `</table>`;
                accountInfo.innerHTML = tableHTML;
            } else {
                accountInfo.innerHTML = '<p>Không có thông tin tài khoản này.</p>';
            }
        })
        .catch(error => {
            console.error('Error fetching account info:', error);
        });
}
