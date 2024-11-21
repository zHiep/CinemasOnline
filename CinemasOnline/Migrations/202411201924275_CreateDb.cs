namespace CinemasOnline.Migrations
{
    using System;
    using System.Data.Entity.Migrations;
    
    public partial class CreateDb : DbMigration
    {
        public override void Up()
        {
            CreateTable(
                "dbo.Banner",
                c => new
                    {
                        BannerID = c.Int(nullable: false, identity: true),
                        Title = c.String(),
                        Image = c.String(),
                        IsEnable = c.Boolean(nullable: false),
                    })
                .PrimaryKey(t => t.BannerID);
            
            CreateTable(
                "dbo.Combo",
                c => new
                    {
                        ComboID = c.Int(nullable: false, identity: true),
                        ComboName = c.String(),
                        Image = c.String(),
                        Description = c.String(),
                        Price = c.String(),
                        Quantity = c.String(),
                        Condition = c.Boolean(nullable: false),
                        Status = c.Boolean(nullable: false),
                    })
                .PrimaryKey(t => t.ComboID);
            
            CreateTable(
                "dbo.Ticket",
                c => new
                    {
                        TicketID = c.Int(nullable: false, identity: true),
                        ShowTimeID = c.Int(nullable: false),
                        ComboID = c.Int(nullable: false),
                        Seat = c.String(),
                        BookingDate = c.DateTime(nullable: false),
                        TotalPrice = c.Decimal(nullable: false, precision: 18, scale: 2),
                        PaymenMethod = c.String(),
                        PaymenDate = c.String(),
                    })
                .PrimaryKey(t => t.TicketID)
                .ForeignKey("dbo.Combo", t => t.ComboID, cascadeDelete: true)
                .ForeignKey("dbo.ShowTime", t => t.ShowTimeID, cascadeDelete: true)
                .Index(t => t.ShowTimeID)
                .Index(t => t.ComboID);
            
            CreateTable(
                "dbo.ShowTime",
                c => new
                    {
                        ShowTimeID = c.Int(nullable: false, identity: true),
                        MovieID = c.Int(nullable: false),
                        RoomID = c.Int(nullable: false),
                        Price = c.Decimal(nullable: false, precision: 18, scale: 2),
                        Time = c.String(),
                        Date = c.DateTime(nullable: false),
                        AvailableSeats = c.Int(nullable: false),
                    })
                .PrimaryKey(t => t.ShowTimeID)
                .ForeignKey("dbo.Movie", t => t.MovieID, cascadeDelete: true)
                .ForeignKey("dbo.Room", t => t.RoomID, cascadeDelete: true)
                .Index(t => t.MovieID)
                .Index(t => t.RoomID);
            
            CreateTable(
                "dbo.Movie",
                c => new
                    {
                        MovieID = c.Int(nullable: false, identity: true),
                        GenreID = c.Int(nullable: false),
                        MovieName = c.String(nullable: false, maxLength: 250),
                        Poster = c.String(maxLength: 250),
                        Duration = c.Int(nullable: false),
                        ReleaseDate = c.DateTime(nullable: false),
                        EndDate = c.DateTime(nullable: false),
                        Director = c.String(),
                        Cast = c.String(),
                        Synopsis = c.String(maxLength: 4000),
                        Status = c.String(),
                    })
                .PrimaryKey(t => t.MovieID)
                .ForeignKey("dbo.Genre", t => t.GenreID, cascadeDelete: true)
                .Index(t => t.GenreID);
            
            CreateTable(
                "dbo.Genre",
                c => new
                    {
                        GenreID = c.Int(nullable: false, identity: true),
                        GenreName = c.String(),
                    })
                .PrimaryKey(t => t.GenreID);
            
            CreateTable(
                "dbo.Room",
                c => new
                    {
                        RoomID = c.Int(nullable: false, identity: true),
                        RoomName = c.String(),
                        NumberSeats = c.Int(nullable: false),
                        Status = c.String(),
                    })
                .PrimaryKey(t => t.RoomID);
            
            CreateTable(
                "dbo.Row",
                c => new
                    {
                        RowID = c.Int(nullable: false, identity: true),
                        RoomID = c.Int(nullable: false),
                        RowName = c.Int(nullable: false),
                        Order = c.Int(nullable: false),
                    })
                .PrimaryKey(t => t.RowID)
                .ForeignKey("dbo.Room", t => t.RoomID, cascadeDelete: true)
                .Index(t => t.RoomID);
            
            CreateTable(
                "dbo.Seat",
                c => new
                    {
                        SeatID = c.Int(nullable: false, identity: true),
                        SeatTypeID = c.Int(nullable: false),
                        RowID = c.Int(nullable: false),
                        SeatName = c.String(),
                    })
                .PrimaryKey(t => t.SeatID)
                .ForeignKey("dbo.Row", t => t.RowID, cascadeDelete: true)
                .ForeignKey("dbo.SeatType", t => t.SeatTypeID, cascadeDelete: true)
                .Index(t => t.SeatTypeID)
                .Index(t => t.RowID);
            
            CreateTable(
                "dbo.SeatType",
                c => new
                    {
                        SeatTypeID = c.Int(nullable: false, identity: true),
                        SeatTypeName = c.String(),
                        PriceMultiplier = c.Double(nullable: false),
                    })
                .PrimaryKey(t => t.SeatTypeID);
            
            CreateTable(
                "dbo.Coupon",
                c => new
                    {
                        CouponID = c.Int(nullable: false, identity: true),
                        CouponName = c.String(),
                        DiscountRate = c.Double(nullable: false),
                        StartDate = c.DateTime(nullable: false),
                        EndDate = c.DateTime(nullable: false),
                        Conditions = c.Decimal(nullable: false, precision: 18, scale: 2),
                        Description = c.String(),
                        RedeemPoint = c.Int(nullable: false),
                        Status = c.String(),
                    })
                .PrimaryKey(t => t.CouponID);
            
            CreateTable(
                "dbo.CouponUser",
                c => new
                    {
                        CouponID = c.Int(nullable: false, identity: true),
                        GetDate = c.DateTime(nullable: false),
                        OutDate = c.DateTime(nullable: false),
                        Status = c.Boolean(nullable: false),
                    })
                .PrimaryKey(t => t.CouponID);
            
            CreateTable(
                "dbo.ChatRoom",
                c => new
                    {
                        RoomID = c.Int(nullable: false, identity: true),
                        CreatedAt = c.DateTime(nullable: false),
                    })
                .PrimaryKey(t => t.RoomID);
            
            CreateTable(
                "dbo.Message",
                c => new
                    {
                        MessageID = c.Int(nullable: false, identity: true),
                        RoomID = c.Int(nullable: false),
                        SenderID = c.Int(nullable: false),
                        MessagesText = c.String(),
                        CreatedAt = c.DateTime(nullable: false),
                        IsRead = c.Boolean(nullable: false),
                    })
                .PrimaryKey(t => t.MessageID);
            
            CreateTable(
                "dbo.News",
                c => new
                    {
                        NewsID = c.Int(nullable: false, identity: true),
                        Title = c.String(),
                        Image = c.String(),
                        Content = c.String(),
                        PostDate = c.DateTime(nullable: false),
                        Status = c.Boolean(nullable: false),
                    })
                .PrimaryKey(t => t.NewsID);
            
            CreateTable(
                "dbo.AspNetRoles",
                c => new
                    {
                        Id = c.String(nullable: false, maxLength: 128),
                        Name = c.String(nullable: false, maxLength: 256),
                    })
                .PrimaryKey(t => t.Id)
                .Index(t => t.Name, unique: true, name: "RoleNameIndex");
            
            CreateTable(
                "dbo.AspNetUserRoles",
                c => new
                    {
                        UserId = c.String(nullable: false, maxLength: 128),
                        RoleId = c.String(nullable: false, maxLength: 128),
                    })
                .PrimaryKey(t => new { t.UserId, t.RoleId })
                .ForeignKey("dbo.AspNetRoles", t => t.RoleId, cascadeDelete: true)
                .ForeignKey("dbo.AspNetUsers", t => t.UserId, cascadeDelete: true)
                .Index(t => t.UserId)
                .Index(t => t.RoleId);
            
            CreateTable(
                "dbo.AspNetUsers",
                c => new
                    {
                        Id = c.String(nullable: false, maxLength: 128),
                        FullName = c.String(),
                        Phone = c.String(),
                        Address = c.String(),
                        Gender = c.Boolean(nullable: false),
                        Avatar = c.String(),
                        Point = c.String(),
                        Email = c.String(maxLength: 256),
                        EmailConfirmed = c.Boolean(nullable: false),
                        PasswordHash = c.String(),
                        SecurityStamp = c.String(),
                        PhoneNumber = c.String(),
                        PhoneNumberConfirmed = c.Boolean(nullable: false),
                        TwoFactorEnabled = c.Boolean(nullable: false),
                        LockoutEndDateUtc = c.DateTime(),
                        LockoutEnabled = c.Boolean(nullable: false),
                        AccessFailedCount = c.Int(nullable: false),
                        UserName = c.String(nullable: false, maxLength: 256),
                    })
                .PrimaryKey(t => t.Id)
                .Index(t => t.UserName, unique: true, name: "UserNameIndex");
            
            CreateTable(
                "dbo.AspNetUserClaims",
                c => new
                    {
                        Id = c.Int(nullable: false, identity: true),
                        UserId = c.String(nullable: false, maxLength: 128),
                        ClaimType = c.String(),
                        ClaimValue = c.String(),
                    })
                .PrimaryKey(t => t.Id)
                .ForeignKey("dbo.AspNetUsers", t => t.UserId, cascadeDelete: true)
                .Index(t => t.UserId);
            
            CreateTable(
                "dbo.AspNetUserLogins",
                c => new
                    {
                        LoginProvider = c.String(nullable: false, maxLength: 128),
                        ProviderKey = c.String(nullable: false, maxLength: 128),
                        UserId = c.String(nullable: false, maxLength: 128),
                    })
                .PrimaryKey(t => new { t.LoginProvider, t.ProviderKey, t.UserId })
                .ForeignKey("dbo.AspNetUsers", t => t.UserId, cascadeDelete: true)
                .Index(t => t.UserId);
            
        }
        
        public override void Down()
        {
            DropForeignKey("dbo.AspNetUserRoles", "UserId", "dbo.AspNetUsers");
            DropForeignKey("dbo.AspNetUserLogins", "UserId", "dbo.AspNetUsers");
            DropForeignKey("dbo.AspNetUserClaims", "UserId", "dbo.AspNetUsers");
            DropForeignKey("dbo.AspNetUserRoles", "RoleId", "dbo.AspNetRoles");
            DropForeignKey("dbo.Ticket", "ShowTimeID", "dbo.ShowTime");
            DropForeignKey("dbo.ShowTime", "RoomID", "dbo.Room");
            DropForeignKey("dbo.Seat", "SeatTypeID", "dbo.SeatType");
            DropForeignKey("dbo.Seat", "RowID", "dbo.Row");
            DropForeignKey("dbo.Row", "RoomID", "dbo.Room");
            DropForeignKey("dbo.ShowTime", "MovieID", "dbo.Movie");
            DropForeignKey("dbo.Movie", "GenreID", "dbo.Genre");
            DropForeignKey("dbo.Ticket", "ComboID", "dbo.Combo");
            DropIndex("dbo.AspNetUserLogins", new[] { "UserId" });
            DropIndex("dbo.AspNetUserClaims", new[] { "UserId" });
            DropIndex("dbo.AspNetUsers", "UserNameIndex");
            DropIndex("dbo.AspNetUserRoles", new[] { "RoleId" });
            DropIndex("dbo.AspNetUserRoles", new[] { "UserId" });
            DropIndex("dbo.AspNetRoles", "RoleNameIndex");
            DropIndex("dbo.Seat", new[] { "RowID" });
            DropIndex("dbo.Seat", new[] { "SeatTypeID" });
            DropIndex("dbo.Row", new[] { "RoomID" });
            DropIndex("dbo.Movie", new[] { "GenreID" });
            DropIndex("dbo.ShowTime", new[] { "RoomID" });
            DropIndex("dbo.ShowTime", new[] { "MovieID" });
            DropIndex("dbo.Ticket", new[] { "ComboID" });
            DropIndex("dbo.Ticket", new[] { "ShowTimeID" });
            DropTable("dbo.AspNetUserLogins");
            DropTable("dbo.AspNetUserClaims");
            DropTable("dbo.AspNetUsers");
            DropTable("dbo.AspNetUserRoles");
            DropTable("dbo.AspNetRoles");
            DropTable("dbo.News");
            DropTable("dbo.Message");
            DropTable("dbo.ChatRoom");
            DropTable("dbo.CouponUser");
            DropTable("dbo.Coupon");
            DropTable("dbo.SeatType");
            DropTable("dbo.Seat");
            DropTable("dbo.Row");
            DropTable("dbo.Room");
            DropTable("dbo.Genre");
            DropTable("dbo.Movie");
            DropTable("dbo.ShowTime");
            DropTable("dbo.Ticket");
            DropTable("dbo.Combo");
            DropTable("dbo.Banner");
        }
    }
}
