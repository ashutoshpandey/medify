<div class="row">
    <form id="form-search">
    <div class="column three  location_search">
        <div class="row">
            <input type="text" name="location" placeholder="location" style="padding-left: 30px;"/>

            <p class="location_icon"><span class="fa fa-map-marker"></span></p>

            <div class="locations">
            </div>
        </div>
    </div>
    <div class="column four  expert_search">
        <div class="row">
            <input type="text" name="search" placeholder="Search by Expert name, Speciality"/>

            <div class="search_content">
                <p><b>Rajan Kumar</b> in Heart surgery</p>

                <p><b>Rajan Kumar</b> in Physiotherapy</p>
            </div>
        </div>
    </div>
    <div class="column three  appointment_modes">
        <input type="hidden" name="mode"/>

        <div class="row">
            <div class="selected"><p><span>Select Mode of appointment</span></p> <span class="arrow"></span>
            </div>
            <div class="modes">
                <p>Online consultation</p>

                <p>Home visit</p>
            </div>
        </div>
    </div>
    <div class="column two">
        <button type="button" id="btn-search">Search</button>
    </div>
    <input type="hidden" name="search-city">
    </form>
</div>