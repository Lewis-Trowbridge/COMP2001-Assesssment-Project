using System;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata;

namespace COMP2001_Authentication_API.Models
{
    public partial class COMP2001_LTrowbridgeContext : DbContext
    {
        public COMP2001_LTrowbridgeContext()
        {
        }

        public COMP2001_LTrowbridgeContext(DbContextOptions<COMP2001_LTrowbridgeContext> options)
            : base(options)
        {
        }

        public virtual DbSet<Passwords> Passwords { get; set; }
        public virtual DbSet<Sessions> Sessions { get; set; }
        public virtual DbSet<Users> Users { get; set; }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            if (!optionsBuilder.IsConfigured)
            {
#warning To protect potentially sensitive information in your connection string, you should move it out of source code. See http://go.microsoft.com/fwlink/?LinkId=723263 for guidance on storing connection strings.
                optionsBuilder.UseSqlServer("Server=socem1.uopnet.plymouth.ac.uk;Database=COMP2001_LTrowbridge;User Id=LTrowbridge; Password=CbbF976*");
            }
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<Passwords>(entity =>
            {
                entity.HasKey(e => e.PasswordId)
                    .HasName("PK__password__82B1190ED871B25D");

                entity.ToTable("passwords");

                entity.Property(e => e.PasswordId).HasColumnName("password_id");

                entity.Property(e => e.PasswordChanged)
                    .HasColumnName("password_changed")
                    .HasColumnType("datetime");

                entity.Property(e => e.PasswordText)
                    .IsRequired()
                    .HasColumnName("password_text")
                    .HasMaxLength(60);

                entity.Property(e => e.UserId).HasColumnName("user_id");

                entity.HasOne(d => d.User)
                    .WithMany(p => p.Passwords)
                    .HasForeignKey(d => d.UserId)
                    .HasConstraintName("FK__passwords__user___6501FCD8");
            });

            modelBuilder.Entity<Sessions>(entity =>
            {
                entity.HasKey(e => e.SessionId)
                    .HasName("PK__sessions__69B13FDC11845075");

                entity.ToTable("sessions");

                entity.Property(e => e.SessionId).HasColumnName("session_id");

                entity.Property(e => e.SessionIssued)
                    .HasColumnName("session_issued")
                    .HasColumnType("date");

                entity.Property(e => e.UserId).HasColumnName("user_id");

                entity.HasOne(d => d.User)
                    .WithMany(p => p.Sessions)
                    .HasForeignKey(d => d.UserId)
                    .HasConstraintName("FK__sessions__user_i__5D60DB10");
            });

            modelBuilder.Entity<Users>(entity =>
            {
                entity.HasKey(e => e.UserId)
                    .HasName("PK__users__B9BE370FDE7B2342");

                entity.ToTable("users");

                entity.HasIndex(e => e.EmailAddress)
                    .HasName("UQ__users__20C6DFF5CDAE9A7B")
                    .IsUnique();

                entity.Property(e => e.UserId).HasColumnName("user_id");

                entity.Property(e => e.EmailAddress)
                    .IsRequired()
                    .HasColumnName("email_address")
                    .HasMaxLength(50);

                entity.Property(e => e.FirstName)
                    .IsRequired()
                    .HasColumnName("first_name")
                    .HasMaxLength(35);

                entity.Property(e => e.LastName)
                    .IsRequired()
                    .HasColumnName("last_name")
                    .HasMaxLength(35);

                entity.Property(e => e.Password)
                    .IsRequired()
                    .HasColumnName("password")
                    .HasMaxLength(60);
            });

            OnModelCreatingPartial(modelBuilder);
        }

        partial void OnModelCreatingPartial(ModelBuilder modelBuilder);
    }
}
